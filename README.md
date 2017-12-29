[https://docs.google.com/document/d/1y3o6k7JBInCVA81INJBGaTjeu-R1Zu5eadaqY7ptC-k/edit](https://docs.google.com/document/d/1y3o6k7JBInCVA81INJBGaTjeu-R1Zu5eadaqY7ptC-k/edit "끄적인 문서").

## 20171227

### 진도
+ gitlab 가입
+ slack 가입
+ gitlab에 개인 활동 기록용 프로젝트 생성
+ Windows환경에서 비트나미 설치.
+ CI view 부분까지 실습 (codelgniter설치, controller, view)

### 정리
+ Codeigniter는 무엇인가? php기반으로 오픈소스이고, 무료로 사용할 수 있는 프래임워크이다. 빠르고 MVC모델을 지원한다.
+ MVC는 무엇인가? Model View Controller의 약자로 에플리케이션을 세가지의 역할로 구분한 개발 방법론이다. 사용자가 Controller를 조작하면 Controller는 Model을 통해서 데이터를 가져오고 그 정보를 바탕으로 시각적인 표현을 담당하는 View를 제어해서 사용자에게 전달하게 된다. 
+ Model? 일반적으로 CI의 모델은 데이터베이스 테이블에 대응된다. 이를테면 Topic이라는 테이블은 topic_model이라는 Model을 만든다. 이 관계까 강제적이지 않기 때문에 규칙을 일관성 있게 정의하는 것이 필요하다.
+ View? 클라이언트 측 기술인 html/css/javascript들을 모아둔 컨테이너이다.
+ Controller? 사용자가 접근한 URL에 따라서 사용자의 요청사항을 파악한 후 그 요청에 맞는 데이터를 Model에 의뢰하고, 데이터를 View에 반영해서 사용자에게 알려준다.

### 일지
+ 윈도우 환경에서 서버환경을 구축하는 과정에서 참고 자료와 똑같이 해도 안되는 일이 발생하여 이를 해결해가는 과정에 시간을 많이 소비하였다. (결국 비트나미사용) 문제를 해결해가면서 어느정도 구조가 머릿속에 그려진다. 
+ MVC패턴에 익숙하지 않아서 답답함이 느껴진다. 익숙해지려면 연습이 필요하다.
+ 따로 구축해놓은 linux서버가 있는데 Codelgniter를 적용하려면 많은 시간이 걸릴것으로 예상된다. 한번 시도를 해봐야 되겠다. 
+ IDE를 ATOM에서 VSCODE로 갈아탐. 가볍고 좋다.
+ README.md에 대해 배웠다. 

## 20171228

### 진도
+ 파일 다루는 방법
+ bootstrap　사용법
+ URI Routing

### 정리
+ bootstrap은 무엇인가？ 반응형이며 모바일 우선인 웹 프로젝트 개발을 위한 HTML, CSS, JS 프레임워크이다．
+ bootstrap은 jquery기반에서 만들어진 library이기 때문에 jquery를 로드해야한다．
+ twitter bootstrap은 html코드에다가 class name만 부트스트랩에서 제시하는대로 작성만 하면 그 class에 맞게 html문서를 알아서 디자인 해주는 것이 가장 중요한 기능성이다．
+ url부분에 index.php감추는 법 ： .htaccess파일을 루트 파일에 생성한 후 내용을 적고 아래의 내용을 입력하여 저장해야 한다.

~~~~
<IfModule mod_rewrite.c>
   RewriteEngine On
RewriteBase /
RewriteCond $1 !^(index\.php|images|captcha|data|include|uploads|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php/$1 [L]
</IfModule>
~~~~

+ URI Routing은 무엇인가? 사용자가 접근 한 URI에 따라서 Controller의 메소드를 호출해주는 기능이다. application/config/routes.php 파일을 수정하면 된다.

~~~~ 
예를 들면
url의 규칙을 의미함.   topic/로 하고 (:num)은 숫자를 의미함.   topic/뒤에  숫자가 온다면  topic/get/$1을 인자로 전달한다.
:num 부분의 값이 $1이라고하는 파라미터가 돼서 뒤에있는 $1이라는 값에 치환됨.
:num이 10이면 $1이 10이 된다는 말임.

$route['topic/(:num)'] = "topic/get/$1";
$route['post/(:num)'] = "topic/get/$1";
~~~~

+ URI Routing은 정규 표현식도 가능하다.

~~~~
맨 왼쪽에있는 a-z의 의미는 a부터 z까지를 의미
+는 하나 이상의 알파벳 문자를 의미
\d는 숫자를 의미
$route['topic/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
ex : http://localhost/index.php/topic/module/get/2 로 하면 위에있는 정규식을 만족
~~~~

+ 처음 사이트에 들어왔을 때 어떤 경로로 들어가게끔 (첫 사이트의 main page) 설정하는 방법 아래와 같다.

~~~~
//사용자가 어떤 path를 지정하지 않고 웹 어플리케이션에 접속했을 때 어떤 controller를 실행할 것인지 결정해주는 것

$route['default_controller'] = 'welcome'; //사용자가 아무런 정보도 적지 않고 접속 했을 시 welcome이라는 class를 호출한다.
~~~~

+ 사용자가 존재하지않느 url로 접속할경우는 아래와 같이 경로를 설정하여 처리할 수 있다.

~~~~
errors클래스에 notfound 메소드로 가서 오류처리해주는 구문을 만들어라. 후에 routes.php파일에 아래와 같이 적는다.

$route['404_override'] = 'errors/notfound'; 
~~~~

### 일지
+ 생활코딩에서 하는대로 따라해도 안되는 문제가 발생하여 시간을 많이 잡아먹음．
+ 대부분 개발할때 MVC패턴으로 개발한다고 함. (중요하다)
+ Ubunu로 비트나미 서버를 만든 후 실행은 되지만 windows에서 그대로 파일을 옮긴터라 특정 파일 부분의 페이지가 뜨지 않음 집가서 찾아봐야될듯 함
+ 재밌네 후후 

## 20171229

### 진도
+ Helper
+ library
+ form 방식
+ php array

### 정리
+헬퍼란 자주 사용하는 로직을 재활용 할 수 있게 만든 일종의library다. CI에는 라이브러리라는 개념이 별도로 존재하는데 Helper와 Library의 차이점은 Helper가 객체지향이 아닌 독립된 함수라면 Library는 객체지향인 클래스이다.

~~~~
helper를 가져오고 싶으면
$this->load->helper(‘url’); 을 사용
여러개를 가져오고 싶다면
$this->load->helper(array(‘url’,’HTML’);  이런 식으로 쓴다.  이렇게 하면 한번의 load로 2개의 helper를 가져올 수 있다.
application/config/autoload.php가 있는데 
그 안에 보면 $autoload[‘helper’] = array(); 에서 추가를 해주면  
직접 application에서 load를 해주지 않아도(global)전역적으로 추가할 수 있다.

created 컬럼의 내용출 출력하는데
<?= $topic->created ?>


mysql에 쿼리문을 아래와 같이 작성하면  created 컬럼의 record 내용들이 UNIX형태의 시간으로 바뀐다. 
select UNIX_TIMESTAMP(creat  ed) from topic;
왜 이렇게 바꾸는가? php를 이용해서 다른 포멧으로 변경하기 쉬운형태로 된 것임. 

이렇게 하면 포멧에 맞게 시간이 출력이 된다. 
<?=date('o년 n월 j일, G시 i분 s초', $topic->created)?>


원하지 않는 방법으로 실행되지 않게 하기 위해서 (직접적으로 스크립트를 실행하지 못하게 하게 위한 구문)
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

kdate의 함수가 존재하는지 체크
if( ! function_exists('kdate')){
 function kdate($stamp){
       return date('o년 n월 j일, G시 i분 s초', $stamp);
   }

}

helper라는 것이 전역으로 사용되는 함수이기 때문에 그 전에 누군가가 미리 정의해 놓은게 있으면 에러가 발생하므로 위에 처럼 함수가 있는지 검사해야 한다.


helpers 디렉토리에 korean_helper.php파일이 있다. 
controllers 디렉토리에 topic.php파일에 get함수에 $this->load->helper(array('url', 'HTML', 'korean')); 라고 적혀있는데 korean이라고 적혀 있는 부분은 korean_helper.php 파일의 의 앞 문자를 구분해서 하는 것이다. 
파일 이름 뒤에  _helper.php 는 꼭 붙여줘야 한다.  그래야 helper.php라는 것을 인식함.
~~~~

+ Library는 무엇인가? 이미 Helper에서 살펴봤듯이 라이브러리는 재활용 가능성이 있는 로직을 재활용 하기 좋은 형태로 만들어둔 것이다. CI는 자주 웹개발에서 자주 사용되는 로직들을 내장(Core) 라이브러리로 제공하고 있다. 내장 라이브러리를 확장(extend)해서 필요에 따라 수정해 사용할 수 있고, 직접 라이브러리를 만들수도 있다. 
+ 객체지향이 아닌 함수로 만들어진 library가 helper고 oop방식으로 만들어진 library가 codeIgniter library다.
+ get, post로 전송받은 page는 아래의 예제처럼 받는다.

~~~~
<?php
echo $_REQUEST['nickname'].'님의 직업은 '.$_REQUEST['job'].'이군요!';
?>
~~~~


### 일지
+ helper쓰는데 <?=auto_link($topic->description)?> 이것을<?=auto_link($topic->description)?>로 바꾸면링크는 뜨지만 이미지 파일이 안나온다. 이 문제를 해결해야 한다. 
