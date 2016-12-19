<?php
use Repository\User as UserRepository;
use Repository\Post as PostRepository;
use Mapper\User as UserMapper;

class EntityManager {

    private $host;
    private $db;
    private $user;
    private $pwd;
    private $port;
    private $connection;
    private $userRepository;
    private $postRepository;
    private $identityMap;

    public function __construct( $host, $db, $port, $user, $pwd )
    {
        $this->host           = $host;
        $this->user           = $user;
        $this->pwd            = $pwd;
        $this->connection     = new \PDO( "mysql:host=$host;port=$port;dbname=$db", $user, $pwd );
        $this->userRepository = null;
        $this->postRepository = null;
        $this->db             = $db;
        $this->identityMap    = [ 'users' => [] ];
        $this->port = $port;
    }

    public function query( $stmt )
    {
        return $this->connection->query( $stmt );
    }

    public function saveUser( $user )
    {
        $userMapper = new UserMapper();
        $data       = $userMapper->extract( $user );
        $userId     = call_user_func(
            [ $user, 'get' . ucfirst( $userMapper->getIdColumn() ) ]
        );
        if ( array_key_exists( $userId, $this->identityMap['users'] ) ) {
            $setString = '';
            foreach ( $data as $key => $value ) {
                $setString .= $key . "='$value',";
            }
            return $this->query(
                "UPDATE users SET " . substr( $setString, 0, -1 ) .
                " WHERE " . $userMapper->getIdColumn() . "=" . $userId
            );
        } else {
            $columnsString = implode( ", ", array_keys( $data ) );
            $valuesString  = implode( "', '", $data );
            return $this->query(
                "INSERT INTO users ($columnsString) VALUES('$valuesString')"
            );
        }
    }

    public function getPostRepository()
    {
        if ( !is_null( $this->postRepository ) ) {
            return $this->postRepository;
        } else {
            $this->postRepository = new PostRepository( $this );
            return $this->postRepository;
        }
    }

    public function getUserRepository()
    {
        if ( !is_null( $this->userRepository ) ) {
            return $this->userRepository;
        } else {
            $this->userRepository = new UserRepository( $this );
            return $this->userRepository;
        }
    }

    public function registerUserEntity( $id, $user )
    {
        $this->identityMap['users'][ $id ] = $user;
        return $user;
    }
}