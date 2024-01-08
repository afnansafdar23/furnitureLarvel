<?php



use App\Models\setting;




  function matadata()
      {
        $mata = setting::latest()->first();
        return  $mata;

    }


?>
