<?php
$is_auth = rand(0, 1);
$user_name = 'Ардабьев Антон'; // укажите здесь ваше имя
function cut_text($s_input, $max = 300)
{
  $count = strlen($s_input); //Получаем длину строки
  $textcount = 0;
  if($count > $max){
    $cyclecount = 0;
    $ar_input = explode(" ", $s_input); //Дробим полученную строку по словам
    foreach ($ar_input as $value) {
      $wordcount = strlen($value); //Получаем длину слова
      $textcount += $wordcount; //Получаем длину предложения
      $cyclecount++;
      if ($textcount > $max){
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
