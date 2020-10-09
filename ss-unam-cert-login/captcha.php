<script src="https://www.google.com/recaptcha/api.js"></script>
<?php
	if (!empty($_POST)) {
		$user = $_POST['usuario'];
		$pssw = $_POST['password'];
		$captcha = $_POST['g-recaptcha-response'];
		$secret = '6Ldtsc8ZAAAAAGe0QJxyBSq0214W_9bTgLVzPjmJ';

		if (!$captcha) {

		}

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		$arr = json_decode($response, TRUE);
		if ($arr['success']) {

		}else {

		}

	}
