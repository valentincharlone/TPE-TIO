<?php 

Class model{ 
    private $db;

    function __construct(){ 
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_movies;charset=utf8', 'root', '');
    } 

    function insert($titulo,$genero,$autor,$audiencia,$profitability,$year){ 
        $consulta=$this->db->prepare("INSERT INTO movies(title,genre,studio,audience_score,profitability,year) VALUES(?,?,?,?,?,?)"); 
        $consulta->execute(array($titulo,$genero,$autor,$audiencia,$profitability,$year));
    }
    
    function getAllMovies(){ 
        $consulta=$this->db->prepare("SELECT title,year,studio,audience_score FROM movies ORDER BY id DESC"); 
        $consulta->execute(); 
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    function getMoviesByGenero($genero){ 
        $consulta=$this->db->prepare("SELECT title,year,studio,audience_score FROM movies WHERE genre=?");
        $consulta->execute(array($genero)); 
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } 

    function getMoviesByAutor($autor){ 
        $consulta=$this->db->prepare("SELECT title,year,studio,audience_score FROM movies WHERE studio=?"); 
        $consulta->execute(array($autor)); 
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }  

    function getGeneros(){ 
        $consulta=$this->db->prepare("SELECT DISTINCT genre FROM movies"); 
        $consulta->execute(); 
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } 

    function countByGenero($genero){ 
        $consulta=$this->db->prepare("SELECT COUNT(genre) FROM movies WHERE genre=?");
        $consulta->execute(array($genero)); 
        return $consulta->fetchColumn();
    }
}


