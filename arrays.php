<html>
    <head>
        <title>webpage</title>
</head>
<body>
    <h3>php arrays : Data structures</h3>
    <?php
    // Empty array with no values
    $array = [];
    echo gettype($array);
    echo "<br>";
    // Empty array with no value index
    $array = [];
    echo var_dump($array);
    echo "<br>";
    //Array with values 
    $array1val = array('dog','cat','cow');
    echo var_dump($array1val);
    echo "<br>";
    //Array with values same datatype
    $array2val = array('dog1','cat1','cow1');
    echo var_dump($array2val);
    echo "<br>";
    // we are printing with indexed values
    $array = array('dog','cat','cow');
    echo ' index[0] '. $array[0] . ' index[1] ' . $array[1] . ' index[2] ' . $array[2];
    echo "<br>";
    // instead of this we can use this
    $array = array('dog','cat','cow');
    for($i = 0; $i < count($array); $i++){
        echo $array[$i] . "<br>";
    }
    ?>
    <hr>
    <h3>Associate Arr</h3>
    <?php
    $associatearr = ['sidh'=>'16','kav'=>'17','dev'=>'18'];
    foreach($associatearr as $key=>$value){
        echo ' for ' . $key . ' age is ' . $value.'<br>';
    }
    ?>
    <hr>
    <h3>Multidimenstional array</h3>
    <?php
    // 1D array
    for($i = 0; $i < 10; $i++){
        echo "*";
    }
    ?>
    <hr>
    <?php
    // 2D array
    for($i = 0; $i <= 10; $i++){
        for($j = 0; $j < $i; $j++){
            echo "*";
        }
        echo "<br>";
    }
    ?>
    
</body>
</html>