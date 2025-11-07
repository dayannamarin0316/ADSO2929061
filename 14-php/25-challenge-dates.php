<?php 
    $title       = '25- Date & Time';
    $description = 'Many ways to handle dates and times.';

    include 'template/header.php';

    echo "<section style='display:flex; justify-content:center; align-items:center; height:60vh;'>";
?>

    <div style="background:#fff; padding:40px 50px; border-radius:25px; box-shadow:0 10px 30px rgba(0,0,0,0.2); text-align:center; width:380px; transition:transform 0.3s ease, box-shadow 0.3s ease;">
    <form method="post" action="">
        <label for="fecha_nacimiento" style="display:block; margin-bottom:12px; font-weight:600; color:#5b2a86; font-size:1.1em;">
            Ingresa tu fecha de nacimiento:
        </label>
        <input 
            type="date" 
            id="fecha_nacimiento" 
            name="fecha_nacimiento" 
            required 
            style="padding:12px; border:2px solid #b57edc; border-radius:12px; outline:none; width:100%; font-size:16px; text-align:center; transition:0.3s;"
        >
        <button 
            type="submit" 
            style="margin-top:25px; padding:12px 25px; background:linear-gradient(135deg,#b57edc,#9b59b6); color:white; font-size:16px; border:none; border-radius:12px; cursor:pointer; transition:background 0.3s ease, transform 0.2s;"
            onmouseover="this.style.background='linear-gradient(135deg,#9b59b6,#b57edc)'; this.style.transform='scale(1.05)';"
            onmouseout="this.style.background='linear-gradient(135deg,#b57edc,#9b59b6)'; this.style.transform='scale(1)';"
        >
            Calcular Edad
        </button>
    </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fechaNacimiento = $_POST["fecha_nacimiento"];
            if (!empty($fechaNacimiento)) {
                $nacimiento = new DateTime($fechaNacimiento);
                $hoy = new DateTime();
                $edad = $hoy->diff($nacimiento)->y;

                echo "<div class='resultado'>Tienes <strong>$edad años</strong> 🎂</div>";
            } else {
                echo "<div class='resultado'>⚠️ Por favor, ingresa una fecha válida.</div>";
            }
        }
        ?>
    </div>
    <?php include 'template/footer.php' ?>
