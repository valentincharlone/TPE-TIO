<?php 
require_once "./Model/model.php"; 
require_once "./View/view.php";

Class controller{ 
    private $model; 
    private $view;

    function __construct(){ 
        $this->model= new Model(); 
        $this->view= new View();
    } 

    function insert(){ 
        if(isset($_POST["titulo"])&&isset($_POST["genero"])&&isset($_POST["autor"])&&
        isset($_POST["audiencia"])&&isset($_POST["profitability"])&&isset($_POST["year"])){ 
            $autor=$_POST["autor"]; 
            $titulo=$_POST["titulo"]; 
            $genero=$_POST["genero"]; 
            $audiencia=$_POST["audiencia"]; 
            $year=$_POST["year"]; 
            $profitability=$_POST["profitability"];
            $this->model->insert($titulo,$genero,$autor,$audiencia,$profitability,$year); 
            $this->getMovies();
        }
    }

    function getMovies(){ 
        $this->view->showMovies($this->model->getAllMovies()); 
    } 

    function getMoviesByGenero(){ 
        if(isset($_GET["genero"])&& $this->existeGenero()){  
            $genero=$_GET["genero"]; 
            $this->view->showMovies($this->model->getMoviesByGenero($genero),$genero);
        } else{ 
            $error= "Error el genero no existe";
            $this->view->showHome($error);
        }
    } 

    function getMoviesByAutor(){ 
        if(isset($_GET["autor"])&& $this->existeAutor()){ 
            $autor=$_GET["autor"];
            $this->view->showMovies($this->model->getMoviesByAutor($autor),null,$autor); 
        }else { 
            $error= "Error el autor no existe";
            $this->view->showHome($error);
        }
    } 

    function existeGenero(){ 
        $genero=$_GET["genero"];
        return (!empty($this->model->getMoviesByGenero($genero)));
    }

    function existeAutor(){ 
        $autor=$_GET["autor"];
        return (!empty($this->model->getMoviesByAutor($autor)));
    }

    function Home(){ 
        $this->view->showHome();
    } 

    function countByGenero(){ 
        $generos=$this->model->getGeneros(); 
        $longitud= count($generos); 
        for ($i=0; $i <$longitud ; $i++) { 
            $cantPelisPorGenero[$i]=$this->model->countByGenero($generos[$i]->genre);
        }        
        $this->view->showCantidadMoviesPorGenero($generos,$cantPelisPorGenero);
    }
}