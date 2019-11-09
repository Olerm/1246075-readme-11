<?php
date_default_timezone_set('Europe/Moscow');
$is_auth = rand(0, 1);
$user_name = 'Ардабьев Антон'; // укажите здесь ваше имя
function cut_text($s_input, $max = 300) {
  $count = strlen($s_input); //Получаем длину строки
  $textcount = 0;
  if($count > $max){
    $cyclecount = 0;
    $ar_input = explode(" ", $s_input); //Дробим полученную строку по словам
    foreach ($ar_input as $value) {
      $wordcount = strlen($value); //Получаем длину слова
      $textcount += $wordcount; //Получаем длину предложения
      $cyclecount++;
      if ($textcount > $max) {
        break;
      }
    }
    $ar_output = array_slice($ar_input, 0, $cyclecount);
    $s_output = implode(" ", $ar_output) . '...' . '<br><a class="post-text__more-link" href="#">Читать далее</a>';
  }
  else{
    $s_output = $s_input;
  }
  return $s_output;
}

function include_template($name, array $data = []) {

    $name = 'templates/' . $name;
    $result = '';
    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();
    return $result;
}

function rand_date() {
  $time_from_2018 = 1514764800; //Время с 2018 года
  $time_now = time(); //Настоящее время
  $rand_time = rand($time_from_2018, $time_now); //Рандомная дата между 2018 годом и настоящим
  return $rand_time;
}

function preobraz($date) {
  $razn = time() - $date;
  if ($razn / 60 < 60) {
    $rez = ceil($razn / 60);
    $plural = get_noun_plural_form($rez, ' минуту назад', ' минуты назад', ' минут назад');
    $output = $rez . $plural;
    return $output;
    }
  if ($razn / 3600 < 24) {
    $rez = ceil($razn / 3600);
    $plural = get_noun_plural_form($rez, ' час назад', ' часа назад', ' часов назад');
    $output = $rez . $plural;
    return $output;
    }
  if ($razn / 86400 < 7) {
    $rez = ceil($razn/86400);
    $plural = get_noun_plural_form($rez, ' день назад', ' дня назад', ' дней назад');
    $output = $rez . $plural;
    return $output;
    }
  if ($razn / 604800 < 5) {
    $rez = ceil($razn / 604800);
    $plural = get_noun_plural_form($rez, ' неделю назад', ' недели назад', ' недель назад');
    $output = $rez . $plural;
    return $output;
    }
  if ($razn / 604800 / 4 < 12) {
    $rez = ceil($razn / 604800 / 4);
    $plural = get_noun_plural_form($rez, ' месяц назад', ' месяца назад', ' месяцев назад');
    $output = $rez . $plural;
    return $output;
    }
  else {
    $rez = ceil($razn / 604800 / 4 / 12);
    $plural = get_noun_plural_form($rez, ' год назад', ' года назад', ' лет назад');
    $output = $rez . $plural;
    return $output;
    }
}

function get_noun_plural_form(int $number, string $one, string $two, string $many): string
{
	$number = (int)$number;
	$mod10 = $number % 10;
	$mod100 = $number % 100;

	switch (true) {
		case ($mod100 >= 11 && $mod100 <= 20):
			return $many;

		case ($mod10 > 5):
			return $many;

		case ($mod10 === 1):
			return $one;

		case ($mod10 >= 2 && $mod10 <= 4):
			return $two;

		default:
			return $many;
	}
}

$arr_popular = [
[
  'title' => 'Цитата',
  'type' => 'post_quote',
  'content' => 'Мы в жизни любим только раз, а после ищем лишь похожих',
  'name' => 'Лариса',
  'avatar' => 'userpic-larisa-small.jpg'
],
[
  'title' => 'Игра престолов',
  'type' => 'post_text',
  'content' => 'Не могу дождаться начала финального сезона своего любимого сериала!',
  'name' => 'Владик',
  'avatar' => 'userpic.jpg'
],
[
  'title' => 'Наконец, обработал фотки!',
  'type' => 'post_photo',
  'content' => 'rock-medium.jpg',
  'name' => 'Виктор',
  'avatar' => '	userpic-mark.jpg'
],
[
  'title' => 'Моя мечта',
  'type' => 'post_photo',
  'content' => 'coast-medium.jpg',
  'name' => 'Лариса',
  'avatar' => 'userpic-larisa-small.jpg'
],
[
  'title' => 'Лучшие курсы',
  'type' => 'post_link',
  'content' => 'www.htmlacademy.ru',
  'name' => 'Владик',
  'avatar' => 'userpic.jpg'
]
];

$pagecontent = include_template('main.php',
['value' => $arr_popular]);
$layoutcontent = include_template('layout.php',
['content' => $pagecontent, 'title' => 'readme: популярное', 'is_auth' => 'is_auth']);

print($layoutcontent);

?>
