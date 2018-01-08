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

## 20180102

### 진도
+ 설정
+ 로그
+ 이미지 저장소 프로젝트 진행


### 정리
+ 설정파일이란? 필요에 따라서 에플리케이션의 동작 방법을 변경하기 위해서 존재하는 것으로 Application/config/ 디렉토리 아래에 위치한다. 
+ config.php : 가장 기본적인 설정 파일로 CI가 동작하는 방식에 대한 다양한 설정 값이 저장되어 있다.
+ autoload.php : Helper, Library와 같은 리소스를 직접 로드하는 것이 아니라 자동으로 로드하게 해서 편의성을 증대시키는 설정. 하지만 불필요한 로딩으로 인해서 성능의 감소를 감수해야 한다.
+ database.php : 데이터베이스의 접속 정보와 설정에 대한 파일로 보안상 중요하다.
+ hoooks.php : CI Core를 수정하는 것은 권장되지 않는다. 새로운 버전을 적용했을 때 충돌이 일어날 가능성이 있기 때문이다. hooks은 사용자가 Core의 기본 실행 흐름에 개입할 수 있는 기회를 제공한다.
+ 소스관리

~~~~
설정 파일 중에는 외부로 유출되면 치명적인 데이터가 있다. 대표적인 것이 데이터베이스 접속 정보인데, 이러한 내용이 외부로 유출되지 않게하기 위해서는 이 파일들을 소스 관리해서는 절대로 안된다.

하지만 설정 파일에 저장된 내용은 에플리케이션이 구동되기 위해서 필요한 중요 내용을 담고 있기 때문에 이 내용을 보관할 필요가 있다. 

이런 이유로 필자는 application/config/template라는 폴더를 만들고 여기에 database.php나 config.php 파일을 버전관리하고, 이 중에서 보안이 요구되는 데이터는 의미 없는 데이터로 변경해서 저장한다. 새로운 환경을 셋팅 할 때는 template 내에 있는 파일을 config 디렉토리로 복사한 후에 수정한다.
~~~~

+ 환경(ENVIRONMENT)

~~~~
환경은 사용자가 에플리케이션을 어떤 용도로 구동하고 있는지에 따라서 다른 설정이 적용되게 하는 편의성을 제공한다. index.php 파일 중 아래 내용을 변경한다. 이 값이 될 수 있는 것은 아래와 같다.

define('ENVIRONMENT', 'development');

-development : 개발 환경에서 사용한다. 모든 에러가 출력된다.
-testing, production : 테스팅이나 실서비스 환경에서 사용된다. 에러가 출력되지 않는다.
환경의 설정 값에 따라서 사용되는 설정값을 다르게 할 수 있다. 이 값을 development로 하고, application/config/development 디렉토리에 config.php 파일을 위치시키면 이 파일의 값이 적용된다.
~~~~

+ config.php 파일 해설

~~~~
$config['language']    = 'english';

언어를 설정한다.

$config['enable_hooks'] = FALSE;

hook 기능을 활성화 한다.

$config['subclass_prefix'] = 'MY_';

Core 클래스를 상속 받아서 커스터마이징 할 때 클래스 이름의 약속된 접두사를 변경한다.

$config['log_threshold'] = 0;

로그를 얼마나 디테일하게 출력할 것인가를 지정한다. 값이 0이면 로깅을 하지 않는다.

$config['log_path'] = '';

로그 파일을 저장할 위치를 지정한다.

$config['cache_path'] = '';

캐쉬 파일을 저장할 위치를 지정한다.
~~~~

+ 설정 정보의 사용

~~~~
예를들어 language 설정을 알고 싶다면 아래와 같이 하면 된다. config 라이브러리와 config.php 파일은 자동으로 로딩되기 때문에 별도의 로드 작업을 하지 않아도 된다. 

$this->config->item('base_url')
~~~~

+ 사용자 정의 설정

~~~~
application/config/config.php 파일에 $config 배열에 값을 추가하거나 별도의 파일을 만들어서 설정 값을 추가 할 수 있다. 파일을 만들어서 사용할 경우 로딩 절차가 필요한데 opentutorials.php 라는 파일을 만들었다면 아래와 같이 하면 된다.

$this->load->config('opentutorials');
$this->config->item('opentutorials');

item 메소드는 설정이 없다면 false를 리턴한다.
~~~~


### 일지
+ project를 하면서 mvc패턴에대해 더욱 정확하게 알게 되었다.
+ helper 라이브러리를 잘 이용해햐 되는것을 깨달았다.
+ 데이터베이스관련부분을 다시 공부해야 되겠다.

## 20180105

### 진도
+ 파일 업로드 & CK Editor
+ Session
+ Core 확장
+ 회원가입 & 비밀번호 암호화
+ 리다이렉션과 로그인 개선

### 정리
+ CKEditor란? 위지윅 에디터라 하는데 HTML 코드없이 포맷을 편집할 수 있다. textarea를 CKEditor로 쓰면 좋다.
+ Session이란? 페이지를 넘기면 로그인 인증을 했던 정보도 넘어가줘야되는데 HTTP 프로토콜은 상태를 유지하는게 없다.  사용자가 웹서버에 접근할 때 사용자를 식별할 수 있는 URL 파라미터를 릴레이로 전달하거나 브라우저에 쿠키를 심어서 사용자의 상태를 기억하는 방법을 이용한다. 이페이지 저 페이지 넘어갈떄의 정보를 교환하는 것
+ Core란? CodeIgniter츠 코드로 프레임워크가 기본적으로 동작하는 로직을 말한다. 이것을 수정하면 나중에 버전 업을 할 때 기존에 수정했던 부분이 사라질 수 있다. 따라서 이런 문제를 없애기위해 Core를 확장해서 커스터마이징하는 방법을 제공하는데 CodeIgniter에서는 코어를 상속하는 방법과 Hook이라는 방법을 제공한다.


### 일지
+ CKEditor site : https://ckeditor.com/
+ 컴퓨터에 데이터베이스 서버가 2개 깔려있음. 3306, 3307 apache 설정방법 실패… 데이터베이스만 현재 비트나미에서 설정되어있는 데이터베이스 서버는 3307임 3306DB 서버를 지우고 3307DB서버를 3306으로 바꿔보았으나 오류가 뜸. 이것저것 손대보았으나 시간을 많이 소비하여 비트나미도 싹 다 삭제 후 다시 설치 후 설정함

## 20180107

### 일지
+ file 업로드가 되지 않는 이유를 발견 : $_FILES['user_upload_file']['tmp_name']에서 userfile이 user_upload_file로 바뀌었음. codeigniter에서파일 업로드는 왜 안되는지 원인을 찾지 못했음.  삽질 시작

## 20180108

### 진도
+ php 배열
+ image-server 프로젝트 
+ 가상 호스트 맛보기(소개만)
+ 프록시 맛보기(소개만)
### 정리

### 일지
+ php 배열에 관한 정확한 개념 습득함.
+ php 프로젝트시 규약이 필요하다는것을 알게 됨
+ dothome.co.kr : 무료 호스팅 워드 프로세스 사이트
+ docker가 컨테이너 기반의 오픈소스 가상화 플랫폼. 정말 좋은듯.
+ bitnami말고 따로따로 설치한 lamp에서 /var/www/html/ 파일에  mvc파일을 복사하면 이게 적용이 되나?? 집가면 실험해봐야겠음.
+ docker -> 어깨너머로 본 소스 코드. 여유있을 때 분석.

~~~~
> docker ps
> docker duild -t file-server-ci
> docker run -d -p 8005:80 -v $(pwd)/files:/var/www/html/files file-server-ci
~~~~



### PHP 작성 규칙

+ MVC에서 Model과 Controller 디렉토리에서 작성하는 파일은 첫글자 대문자로Views 디렉토리의 파일들은 첫글자 소문자로 파일을 만들기
+ 조건물 사용시 아래와 같은 형태로 작성  끝나느 블록 바로 옆에 else 붙이기

~~~~
if(){
} else{
}
~~~~

+ 파일 이름 만들 시 단어와 단어사이 '_' 사용
## 고려해야됨.
+ 함수 선언시 첫글자 소문자. '_' 사용

+ 변수 선언시 첫글자 소문자. '_' 사용하지 않고 단어 붙이기

+ 긴 단어를 변수로 작성해야될 시 축약가능.  축약시 부과적인 설명을 주석으로 써놓기.

## 언더바로 사용할지 단어를 붙여쓸지 결정 후 수정해야 함.
+ 변수 선언시 '_'사용하지 않고 단어를 이어붙인다. 붙여진 두번째 단어부터 첫글자는 대문자로
+ 변수 선언시 '_' 사용


+ 주석 사용시 //와 /* */만 사용 #은 사용하지 않기.
