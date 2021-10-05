<?php include 'Header.php';
$user = $_SESSION["user"];

$path = $m->fm->makeUserDir($user->id);

$errors = array();

if(isset($_POST["username"])){
    $user = $_POST["username"];
    if(strlen($user) < 3) array_push($errors,"Invalid  Username");
}
else{
    array_push($errors,"Username Required");
}
if(isset($_POST["password"])){
    $pass = $_POST["password"];
    if(strlen($pass) < 3) array_push($errors,"Invalid  Password");

}
else {
    array_push($errors,"Password Required");
}

if(sizeof($errors) == 0){
    //putenv('PATH=C:\Users\Halima');
    $output = shell_exec('call scrap/test.bat');
      print_r($output);
        exit;
    //$output = shell_exec('npm install puppeteer -g --save' . ' 2>&1');
    //$output = shell_exec('node scrap/copart.js ' . $user . " " . $pass . ' 2>&1');
    $output=null;
    $retval=null;
    exec('node ', $output, $retval);
    echo "Returned with status $retval and output:\n";

    print_r($output);
    exit;
    $name = "LotsWon_" .  date("Y F d") . ".csv";
    $temp =  "C:\\Users\\Halima\\Downloads\\" . $name;
    $file_path = $path . "file.csv";
    $data = "";
    $myfile = fopen($temp, "r") or die("Unable to open file!");
    $data =  fread($myfile,filesize($temp));
    fclose($myfile);


    $myfile = fopen($file_path, "w") or die("Unable to open file!");
    fwrite($myfile, $data);
    fclose($myfile);


    header('Location: import_view.php');
}


?>