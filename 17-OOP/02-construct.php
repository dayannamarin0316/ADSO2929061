<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17-OOP</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="OOP">
    <nav>
        <a href="../index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
        </a>
    </nav>
    <main>

<?php
    $title= '02 - Construct';
    $description ='Special method that initializes a new object upon creation.';

    include_once 'template/header.php';
    echo "<section>";

    class playlist{
        public $name;
        public $artist=array();
        public $album=array();
        public $genre=array();
        public $image=array();
        public $year=array();

        public function __construct($name){
            $this->name=$name;
        }

        public function setPlayList($artist,$album, $genre, $image, $year){
            $this->artist[] = $artist;
            $this->album[] = $album;
            $this->genre[] = $genre;
            $this->image[] = $image;
            $this->year[] = $year;
        }

        public function getPlayList() {
            echo "<h3> PlayList: $this->name </h3>";
            echo "<div style='display: flex; gap: 2rem; flex-direction: column'>";
                    for($i = 0; $i < count($this->artist); $i++) {
                        echo "<div style='display: flex; gap: 1rem'>";
                            echo "<img src='".$this->image[$i]."' width='120px'>";
                            echo "<div>";
                                echo "<h4> Artist: ".$this->artist[$i]."</h4>";
                                echo "<h5> Genre: ".$this->genre[$i]."</h5>";
                                echo "<h5> Year: ".$this->year[$i]."</h5>";
                            echo "</div>";
                        echo "</div>";
                    }
             echo   "</div>";
        }
    }

    $pl = new playlist('Feliz Navidad');
    $pl->setPlayList('Mariah Carey','Merry Crismas','Pop-Holiday','https://shorturl.at/jOZJu','1994');
    $pl->setPlayList('Wham','Music from the Edge of heaven','Pop','https://shorturl.at/T8mQQ','1994');
    $pl->setPlayList('Rodolfo Aicardi','Rodolfo Aicardi y Su Tipica Ra7','Cumbia','https://shorturl.at/KiulU','1979');

    $pl->getPlayList();

 

    include_once 'template/footer.php';