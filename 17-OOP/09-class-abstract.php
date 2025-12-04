<?php
$title = '09 - Class Abstract';
$description = 'A class that cannot be instantiated, only extended from.';

include_once 'template/header.php';
echo '<section>';

abstract class DatabaseConnector {
    
    private $host;
    private $dbName;
    private $user;
    private $password;

    protected $pdo;

    public function __construct(
        $host = 'localhost',
        $dbName = 'pokeadso',
        $user = 'root',
        $password = ''
    ) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;

        $this->connect();
    }

    protected function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    protected function disconnect(){
        $this->pdo = null;
    }
}

class PokemonModel extends DatabaseConnector {

    public function getAllPokemons() {
        $this->connect();
        
        try {
            $sql = "SELECT id, name, type FROM pokemons ORDER BY id";
            $stmt = $this->pdo->query($sql);
            $pokemons = $stmt->fetchAll();
            return $this->renderTable($pokemons);
        } catch (PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            return '<div>Error al cargar los Pokemones.</div>';
        } finally {
            $this->disconnect();
        }
    }

    private function renderTable(array $data) {
        if (empty($data)) {
            return '<div>No se encontraron Pokemones.</div>';
        }

        $output = "<table border='1' cellpadding='10' style='width: 100%;'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>";

        foreach ($data as $pk){
            $output .= "<tr>
                        <td>{$pk['id']}</td>
                        <td>{$pk['name']}</td>
                        <td>{$pk['type']}</td>
                    </tr>";
        }

        $output .= '</tbody></table>';

        return $output;
    }
}

$pokemonList = new PokemonModel();
echo $pokemonList->getAllPokemons();


include_once 'template/footer.php';