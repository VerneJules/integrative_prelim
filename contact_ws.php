<?php
class Contact{
	public $nickname;
	public $fullname;
	public $bday;
	public $gender;
	public $addr;
	public $email;
	public $imageurl;
	public function __construct($nickname, $fullname, $bday, $gender, $addr, $email, $imageurl) {
		$this->nickname = $nickname;
		$this->fullname = $fullname;
		$this->bday = $bday;
		$this->gender = $gender;;
		$this->addr = $addr;
		$this->email = $email;
		$this->imageurl = $imageurl;
	}
}
$contacts = [new Contact("kate", "kathryn bailey beckinsale", "26-jul-1973", "female", "#23 underworld drive", "kate@lycans.net", "images/001.jpg"),
			new Contact("bob", "robert john downey jr", "04-apr-1965", "male", "45 steel blvd", "jstark@ironman.net", "images/002.jpg"),
			new Contact("jessica", "jessica claire biel", "03-mar-1982", "female", "27 texas avenue", "jbiel@yahoo.com", "images/003.jpg"),
			new Contact("scarjo", "scarlett johansson", "22-nov-1984", "female", "18 dahlia avenue", "sjo@ironman2.org", "images/004.jpg"),
			new Contact("brad", "william bradley pitt", "18-dec-1963", "male", "#43 hollywood blvd", "jsmith@meetjoeblack.gov", "images/005.jpg")];

//~ echo json_encode($contacts);
$search = "";
if(isset($_GET["search"])){
	$search = $_GET["search"];
}
if(isset($_POST["search"])){
	$search = $_POST["search"];
}
$output = array();
foreach($contacts as $key => $c){
	if(stripos($c->fullname,$search) !== false || stripos($c->nickname,$search) !== false || $search === ""){
		array_push($output, $c);
	}
}
$json = json_encode($output);
echo $json;
?>