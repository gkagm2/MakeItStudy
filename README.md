[https://docs.google.com/document/d/1y3o6k7JBInCVA81INJBGaTjeu-R1Zu5eadaqY7ptC-k/edit](https://docs.google.com/document/d/1y3o6k7JBInCVA81INJBGaTjeu-R1Zu5eadaqY7ptC-k/edit "끄적인 문서").

# 20180108 서버용으로 사용하라고 넷북 얻음!

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
+ docker관련
+ 워드프레스
### 정리
+ 워드프레스는?

~~~~
워드프레스는 코어/테마/플러그인으로 구성되어 있다. 쉽게 생각하면 코어는 자동차의 엔진, 테마는 자동차의 외관, 플러그인은 엑세서리라고 생각하면 된다. 워드 프레스는 항상 버전업을 빨리하기 때문에, 코어 파일을 바꾸면 절대 안 된다고 한다. 바꾼 후 부터는, 업그레이드를 하면 수정한 파일들이 다 날아가 버리고, 또 수정을 하지 않으면 그 후에 나오는 모든 종류의 플레그인과 테마를 지원받지 못한다.
~~~~

+ docker는 ? 

~~~~
-리눅스의 응용 프로그램들을 소프트웨어 컨테이너 안에 배치시키는 일을 자동화하는 오픈 소스 프로젝트이다. 
- 도커 컨테이너는 일종의 소프트웨어를 소프트웨어의 실행에 필요한 모든 것을 포함하는 완전한 파일 시스템 안에 감싼다. 여기에는 코드, 런타임, 시스템 도구, 시스템 라이브러리 등 서버에 설치되는 무엇이든 이우른다. 이는 실행 중인 환경에 관계 없이 언제나 동일하게 실행될 것을 보증한다.
- 도커는 스리눅스에서 운영 체제 수준 가상화의 추상화 및 자동화 계층을 추가적으로 제공한다. 도커는 cgroups와 커널 이름공간과 같은 리눅스 커널, 또 aufs와 같은 유니언 가능 파일 시스템의 리소스 격리 기능을 사용하며, 이를 통해 독립적인 컨테이너가 하나의 리눅스 인스턴스 안에서 실행할 수 있게 함으로써 가상 머신을 시작하여 유지보수해야 하는 부담을 없애준다.
~~~~

+ 가상호스트란? 

~~~~
- 하나의 웹서버에서 2개 이상의 여러 개의 웹서버를 운영하는 것을 가상 호스트 (virtual host)라고 한다.
- 장점 : 하나의 서버에서 복수의 홈페이지를 사용하므로 서버의 비용절감.
- 대부분의 호스팅업체에서 사용하는 각기 다른 회사의 홈페이지의 운영방법임.
- 가상호스트는 컴퓨터만 한대이지 ip와 domain도 다르기 때문에 외부에서는 같은 호스트에서 운영되는 사실을 알 수 없다.  ( 개인적인 질문 : 크래킹당하면 어떻게되는건가...?)
- http://cheolgoon.tistory.com/entry/%EB%A6%AC%EB%88%85%EC%8A%A4-%EA%B0%80%EC%83%81%ED%98%B8%EC%8A%A4%ED%8A%B8Virtual-host
~~~~

+ MVC에서 Models와 Controller는 첫글자 대문자로 파일 구성해야함 (표준) Views에는 소문자

### 일지
+ 도메인을 무료로 사용할 수 있도록 해주는 사이트 : http://www.freenom.com
+ 오늘 너무 많은 꿀팁과 가르침과 넷북을 받아서 정신없이 기쁘다
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

+ 이전에 프로젝트는 같이하던 분이 다 하셨다... 잠자는 시간 줄이기로 결정.
+ **오마이갓!  노트북 선물로 받았다!** 서버로 사용하라고 주셧따 ! 오늘은 밤새기로 후후...
+ 김진형 이사님께 햄버거를 얻어먹었다. 소스가 맛있음

## 20180109

### 진도
+ 워드프레스

### 정리
+ 워드프레스 파일의 소스를 분석하는 도중 .scss가 나왔다 조사해 보니

~~~~
참고자료 : http://biscuitpress.kr/480
워드프레스 3.8 버전이 출시되었을때 가장 눈에 띄는 변화는 어드민 영역의 스타일이었습니다.
앞쪽(front-end) 스타일과 어느정도 색을 맞추기 위해서 CSS를 뒤적거리다보니 .scss 파일들이 눈에 띄더군요. 3.8 버전부터 어드민 영역 스타일링에 SCSS가 도입된 것입니다.
SCSS(Sassy CSS)는 몇년전 “보다 나은 CSS”를 목적으로 개발된 SASS의 새로운 버전입니다. 작성하는 방법은 CSS와 완전하게 동일하고, 여기에 추가된 몇가지 프로그래밍적 요소를 사용하는 방법만 알면 된다고 한다.
~~~~

+ 워드프레스 

~~~~
워드프레스로 사이트 만들어보는중
강의 사이트 :  https://www.youtube.com/watch?v=32hRS92S9K0
워드프레스 다운로드 후 wordpress파일을  htdocs에 넣어주면 됨.
그 후 localhost/wordpress에서 설정하면 됨.

워드프레스 적용방법.
htdocs 디렉토리 안에 wordpress 파일을 넣고 http://localhost/wordpress로 가면 초기 설정을 할 수 있다.
워드프레스 테마 적용방법
htdocs/wordpress/wp-content/themes/ 경로에 zip을 가져온 후 압축을 푼다.
그 후 관리자 모드로 접속 후 테마메뉴로 가서 새로 추가버튼을 클릭한다.

상단에 테마 업로드 버튼을 누르고 파일선택 버튼을 클릭한다.  enfold.zip파일을 찾아서 확인버튼을 누른다. 그럼 설치됨. 그 후 활성화를 누르면 적용됨.

워드프레스 사이트 이전하는방법
https://www.thewordcracker.com/intermediate/duplicate-the-wordpress-site-with-duplicator/
~~~~


### 일지
+ 넷북 전원이자꾸 꺼진다. 넷북 베터리 충전표시는 들어오지만 전원을 키면 바로 꺼진다. 여러번 시도해봤지만 자꾸 꺼져서 서버 세팅을 하다가 도중에 포기.. 원인 파악중.. 
+ 워드프레스 소스를 분석하면서  php에서 제공해주는 모르는 함수를 보이는대로 뽑아봤다.. 너무 많다 여유날때마다 조금씩 검색해서 정리해놔야겠다. 
+ gkagm2@dothome.co.kr 에 테마를 받아서 적용시켜보려 했지만 용량제한으로 인해 불가능.





## 20180110~20180112
+ 특강 링크 : https://docs.google.com/document/d/1pEZQ8B4t8uHLANYDMbbdqu6apfy1-cmo71LETce1KFk/edit

### 진도
+ goorm, slack, dothome 사이트 소개 및 설명

+ ---php문법---
+ get,post방식
+ 함수
+ 조건문
+ 데이터베이스 읽고 쓰기
+ github사용법
+ 게시판 만들기
+ slack 알림메시지

### 정리


### 일지
+ php 기본 문법 및 데이터베이스의 읽고 쓰기에 대해 배움. 알차게 알려주심으로 기본기가 점점 탄탄해진다.

## 20180115

### 진도
+ wordpress clone 조사, wordpress waffle 사이트 분석

### 정리
+ breadcrumbs : 프로그램, 문서, 웹사이트 등에서 사용자의 탐색 경로를 시각적으로 제공해 주는 그래픽 사용자 인터페이스(GUI). 사용자가 복잡하게 탐색하는 고자ㅓㅇ에서 자신의 위치를 파악할 수 있게 하고, 계층적 탐색 경로 등을 시각적으로 보여주는 등 편의를 제공한다.
+ MailChimp : 무료로 이메일을 대량으로 전송할 수 있는 세계 1위의 이메일 마케팅 서비스회사이다.

~~~~
1
.Theme Options

첫 페이지를 무엇으로 지정할지 설정할 수 있다.
어떤 블로그를 보여줄지 설정할 수 있다.
로고 이미지를 설정할 수 있다. (URL도 가능)
사이트주소 왼쪽편에 나와있는 Favicon도 설정 할 수 있다.
2.General Layout

레이아웃을 설정할 수 있다.
컨테이너, 사이드바 등등의 레이아웃을 설정한다.
3.General Styling

CSS부분을 고칠 수 있다.
색상변경 및 스타일링을 할 수 있다.
4.Advanced Styling

각 태그들을 스타일링 할 수 있고 버튼의 크기를 조절 할 수 있다.
5.Header

헤더 타이틀과 브레드 크럼즈를 설정 할 수 있다
헤더의 레이아웃과, 행동, 요소, 투명도, 모바일 메뉴를 성정할 수 있다.
6.Sidebar Settings

사이드바의 위치를 설정할 수 있다. (왼쪽, 오른쪽, 안보이기)
사이드바 의 Archive page, Blog의 위치를 설정할 수 있다.
사이드바의 색상을 변경할 수 있다.
7. Footer

Footer부분에 위젯과 소켓을 세팅할 수 있다.
Column의 개수를 설정할 수 있다.
Copyright을 설정할 수 있다.
8.Blog Layout

블로그 스타일링, 레이아웃설정을 할 수 있다.
post 스타일링할 수 있다.
블로그 포스터를 붙일 수 있다. 예를들어 (facebook link ,twitter link etc)
9.Social profiles

소셜 Icon과 Icon의 url을 설정할 수 있다.
10.Newsletter
~~~~

newsletter 기능을 이용할 수 있다.

### 일지
+ waffle clone시 메인 페이지에 왜 안뜨는지 해결못함
+ 여러 무료 clone 플러그인 설치 시 무료는 오류뜸, 유로로 해도 오류가 안 뜰지 장담못함

## 20180116

### 진도
+ 워드프레스 clone 플러그인 찾기, clone 방법 찾기
+ 에러해결

### 정리
+ 워드프레스 데이터베이스 설정파일은 wp-config.php에서 수정 가능

### 일지
+ 사이트를 복사하는데 수많은 오류와 왜 그런 문제가 발생되는지 여러 케이스를 고려하여 이것저것 다 시도해봄. 

~~~~
clone하는데 예상오류
워드프레스 버전문제. - 아닌걸로 판명

수많은 시행착오 및 추측과 실험

1.서버에서 FTP를 이용하여 파일을 받아오는 와중에 파일이름 깨짐현상 발생
2.서버에서 tgz tar파일로 압축 후 윈
도우에서 압축해제 과정에서 중복된 파일이 있다고 뜸
3.서버에서 zip으로 압축 후 FTP를 이용하여 파일을 받아옴. 압축 풀림. htdocs에 넣고 돌려보는데 Error establishing a database connection 오류 발생 -> wp-config.php파일 삭제 후 localhost시작.
돌아가서 데이터베이스 생성 후 돌려보는데 와플화면이 떠야되는데 기본 화면이 뜸
Error establishing a database connection 해결방법 사이트 :
https://www.elegantthemes.com/blog/tips-tricks/how-to-fix-error-establishing-a-database-connection-in-wordpress

~~~~

+ 오늘 docker가 꽤나 좋다는걸 다시 느낌. linux부터 시도해봐야겠음.
+ 버츄얼박스에있는 우분투에서 비트나미로 안하고 lamp로 서버를 설치 함. 하다보니 우분투 서버에서도 동작되는지 확인결과 php가 안먹힘. 고쳐봐야함
+ 현재 가지고 있는 개인 서버의 php버전이 5.몇임 php5버전 지우고 php7버전 새로 설치함. 안되길래 당황했지만 다행히도 고쳐서 웹에 php가 됨 (데이터베이스 테스트 해봐야됨)

## 20180117

### 일지
+ 현장실습 중간발표

## 20180118

### 진도
+ 워드프레스 플러그인 만들기

### 정리
+ base64_encode() 함수는 주어진 데이터를 base64로 인코드한다. 이 인코딩은 메일 본문처럼 8비트를 사용할 수 없는 전송층에서 바이너리 데이터를 안전하게 전송하도록 설계되어있다.(http://php.net/manual/kr/function.base64-encode.php)
+ stripslashes() 함수는 따옴표 처리한 문자열을 푼다. (magic_quotes_sybase)가 켜져 있으면 ,백슬래시는 처리되지 않고, 이중 어퍼스트로피를 하나로 교체한다. (http://php.net/manual/kr/function.stripslashes.php)
+ plugins_url() 해당 디렉토리 아래의 특정 파일 대한 절대 URL을 검색한다.(https://codex.wordpress.org/Function_Reference/plugins_url)
+ Plugins은 워드 프레스의 기능을 확장하는 도구이다. Plugin은 카테고리 목록을 포함하며, 기타 플러그인 저장소에 대한 링크를 제공한다. 워드 프레스의 핵심인 유연성을 극대화하고 코드를 최소화하기 위해 플러그인은 사용자 정의 함수 등 각 사용자 맞춤형 요구를 받아들일 수 있는 기능을 제공한다.
+ php 에러코드를 출력하게끔 해주는 문장.(추가하면 웹사이트에 에러가 보임)

~~~~
error_reporting(E_ALL);
ini_set("display_errors", 1);
~~~~

+ 데이터베이스 root로 접근하는 방법 mysql -uroot -p11111 -hlocalhost
+ 데이터베이스 접근권한주는방법 (http://link2me.tistory.com/431)

### 일지
+ php에서 데베 연동을 할 때 $connect = mysql_connect("localhost"."아이디"."비밀번호","메타데이터(스키마)");이  문장에 아래와 같이 오류가 뜸.

~~~~
Fatal error: Uncaught Error: Call to undefined function mysql_connect() in C:\Bitnami\wampstack-7.1.12-0\apache2\htdocs\wp-content\plugins\makeit-sms\form.php:73 Stack trace: #0 {main} thrown in C:\Bitnami\wampstack-7.1.12-0\apache2\htdocs\wp-content\plugins\makeit-sms\form.php on line 73

이 문제를 해결하기위해 여러 시도를 해봄 해결이 안됨. 
참고 사이트 : pentutorials.org/course/62/5174

MySQL 트러블 슈팅
만약 MySQL을 사용하는 과정에서 아래와 같은 에러가 난다면 MySQL 익스텐션을 활성화해야 한다. Bitnami 윈도우 버전의 경우 아래와 같이 처리했다. 다른 운영체제는 이 방법을 참고한다.
1
Fatal error: Call to undefined function mysql_connect() in D:\BitNami\wampstack-5.4.12-0\apache2\htdocs\mysql\process.php on line 2
php의 디렉토리가 D:\BitNami\wampstack-5.4.21-0\php일 경우 D:\BitNami\wampstack-5.4.21-0\php\php.ini 파일을 열고 아래의 코드 앞의 ;을 제거한다.
1
extension=php_mysql.dll
그리고 익스텐션의 dll 파일이 설치된 디렉토리의 기본경로를 변경해준다. 아래의 경로는 필자가 설치한 Bitnami를 기준으로 한 것이기 때문에 사용자마다 다를 수 있다. 자신의 환경에 맞게 수정해준다.
1
extension_dir = "D:\BitNami\wampstack-5.4.21-0\php\ext"
~~~~

+ 자고일어나서 켜보니 새로운 에러가 발생

~~~~
Warning: Parameter 1 to wp_default_scripts() expected to be a reference, value given in C:\Bitnami\wampstack-7.1.12-0\apache2\htdocs\wp-includes\plugin.php on line 601

Warning: Parameter 1 to wp_default_scripts() expected to be a reference, value given in C:\Bitnami\wampstack-7.1.12-0\apache2\htdocs\wp-includes\plugin.php on line 601

아래의 사이트의 방법으로 해봤더니
https://core.trac.wordpress.org/ticket/37772

2개였던 경고창이 1개가 됨.
버전 호환문제인가??
~~~~

+ 이런 자잘한 오류로인해 시간을 소비해야 된다는게 아쉬움

## 20180119

### 진도
+ 워드프레스 플러그인 만들기

### 정리
+ 정리

~~~~
session_id() :
http://php.net/manual/en/function.session-id.php

__FILE__ :
The full path and filename of the file with symlinks resolved. If used inside an include, the name of the included file is returned.
http://php.net/manual/en/language.constants.predefined.php
function __construct() :
http://php.net/manual/en/language.oop5.decon.php

add_shortcode( ) :
add_action() : 워드프레스 페이지(사용자측)이 열릴때 또는 관리자(어드민)이 열릴때 특정 행동이나 첨부 등을 수행할 수 있는 행동을 추가할 수 있게 해 준다.

wp_enqueue_scripts : 스크립트가 큐에 올라간 타이밍, 즉 페이지의 상단에서 헤더 부분이 만들어질 때 이 스크립트가 추가된다.

add_action()의 두번째 파라미터는 함수를 호출할 수 있다.

array_key_exists :array_key_exists() : 주어진 키와 인덱스가 배열에 존재하는지 확인
http://php.net/manual/kr/function.array-key-exists.php

json_decode() : JSON 인코딩 된 문자열을 가져 와서 PHP 변수로 변환합니다.
http://php.net/manual/en/function.json-decode.php
~~~~

### 일지
+ 성찰

~~~~
같이 현장실습 나온 사람과 나의 코딩실력이 극과 극임
나는 코딩을 엄청 못하는걸로 결론.
성찰을 해보자... 이유가 뭘까... 
일단 요구사항을 받아들이는 것을 잘 이해해야 한다. 나는 그러지 못하는 것 같다.
확실히 어떤 역할을 하고 무엇을 만들어야 되는지 알아야된다. 상대방이 번거롭겠지만 확실하지 않으면 확실히 무엇을 만들어야되는지 알때까지 다시 물어보자

같이 현장실습 하는 사람과 비교하면 나는 만드는 속도가 현저히 느리다.

이유 : 아는 선에서 직접 만드려고한다. 간단하게 만들 수 있는것도 리팩토링과 가독성부분을 최대한 고려하며 하려고 함.(안해도되는 부분을 너무 오랫동안 깊이 생각함).
 요구했던부분을 넘어서 없는것들도 만드려고 함
또한 기본적인 php문법지식이 부족하다. 이해능력이 딸린것같다. 영어실력이 부족하여 구글링에 문제

그 사람을 분석하면 일단 인터넷으로 미리 만들어진게 있는지부터 찾아본다. 찾아서 적용한다. 덕분에 코드 길이도 적어져 깔끔하게 보이긴 함.
코딩 방법을 바꿔봐야겠음 
무엇을 만들어야 될지 정확히 알고 -> 미리 만들어져 있는지 구글링한다. 있으면 대입한다. 요구했던 부분만 하고 끝낸다.
기본지식이 나보다 많이 알고있다.

새벽 1시부터 일어나서 코딩하다보니 현장실습 기관에 가서 15시정도부터 집중력 저하. 원인 : 식곤증

해결방법 : php기본문법 배운 후 안보면서 코딩할 수 있을정도로의 훈련, 
다 만들겠다는 생각을 하지 말고 이미 만들어져 있는지 구글링부터 하자.
무엇인가 만들어야되는 요구가 왔을 때 정확하게 이해. 요구를 듣기만 하면 까먹을 수 있으니 적어놓자.
요구이상으로 무엇을 만드려고 하지 말자.
하다가 샛길로 빠지지 말자. 나는 멀티태스킹은 못하는걸로 판단. 하나가 해결되면 다음것을 해결하는 방법으로 하자.
~~~~

## 20180122

### 진도
+ 워드프레스 플러그인 만들기
+ php언어 객체, 인스턴스 생성, 객체의 속성과 기능 사용, 클래스 상속하기

### 정리
+ 쿠키 : 

~~~~
 웹 서버에서 웹 브라우저를 통해 접속자의 하드디스크에 저장하는 정보이다. 이때 웹 브라우저는 쿠키를 건네준 사이트의 이름으로 쿠키를 하드디스크에 저장하게 된다. 쿠키가 접속자의 하드디스크에 저장되기 때문에 웹 서버가 쿠키를 원한다고 해서 마음껏 쿠키정보를 가져올 수는 없다. 단지 웹 브라우저가 건네주는 쿠키만을 받을 수 있다. 그래서 웹 브라우저가 웹 서버에 접속할 때 해당 사이트 이름으로 된 쿠키가 있는지 먼저 하드디스크에서 검색한다. 만약 있다면 쿠키를 웹 서버에 전달한다. 이러한 방식 때문에 웹 브라우저가 쿠키를 지원하지 않거나 사용자가 쿠키의 생성을 제한해 놓았다면 쿠키를 사용할 수 없다.
~~~~

+ 세션 : 

~~~~
 HTTP 프로코톨은 사용자의 접속을 매번 새롭게 인식하여 어떤 요청들이 하나의 사용자로부터 발생한 일련의 요청임을 인지하지 못하는 단점이 있다고 했다. 이를 사용자의 상태를 유지할 수 없다고 하여 stateless 프로토콜이라고 한다. 이러한 HTTP 프로토콜의 단점을 보완하고자 세션이 등장했다. 세션은 쿠키와 유사하지만 큰 차이가 있다. 쿠키가 접속자의 컴퓨터에 저장되는 반면 세션은 웹 서버에 저장딘다. 쿠키는 사용자의 컴퓨터에 저장되기 때문에 사용자가 홈페이지에 들어오는 것은 알 수 있어도 로그아웃을 하지 않고 나가 버리면 웹 서버는 사용자가 접속을 끊었는지 아직 웹 페이지를 읽고있는 거인지 알 수가 없다. 그러나 세션은 서버 측에 존재하기 때문에 웹 서버가 주기적으로 세션의 상태를 확인할 수 있어서 특정 시간동안 웹 사이트 내에서 어떠한 이동도 발생하지 않으면 사용자가 나간 것으로 간주하여 세션을 삭제할 수 있다.
~~~~

### 일지
+ 워드프레스 플러그인 구조를 이해하는데 어려움. 인터넷으로도 찾아보고 미리 만들어져있는 플러그인도 뜯어봐야 되겠음

## 20180123

### 진도
+ verison관리
+ markdown 문법

### 정리
+ CSRF : 사이트 간 요청 위조(또는 크로스 사이트 요청 위조, 영어: Cross-site request forgery, CSRF, XSRF)는 웹사이트 취약점 공격의 하나로, 사용자가 자신의 의지와는 무관하게 공격자가 의도한 행위(수정, 삭제, 등록 등)를 특정 웹사이트에 요청하게 하는 공격을 말한다.

~~~~
사이트 간 스크립팅(XSS)을 이용한 공격이 사용자가 특정 웹사이트를 신용하는 점을 노린 것이라면, 사이트간 요청 위조는 특정 웹사이트가 사용자의 웹 브라우저를 신용하는 상태를 노린 것이다. 일단 사용자가 웹사이트에 로그인한 상태에서 사이트간 요청 위조 공격 코드가 삽입된 페이지를 열면, 공격 대상이 되는 웹사이트는 위조된 공격 명령이 믿을 수 있는 사용자로부터 발송된 것으로 판단하게 되어 공격에 노출된다.
~~~~
### 일지
+ 문서에도 버전관리를 하면 좋을 것 같다.
+ kboard 
+ 방학때 학교좀 그만갔으면 좋겠다..
+ 워드프레스에서 지원하는 마크다운 문법: http://blog.kalkin7.com/2014/02/05/wordpress-markdown-quick-reference-for-koreans/
+ 버전규칙: http://seorenn.blogspot.kr/2012/02/version.html


## 20180124

### 진도
+ wordpress makeit-sms plugins 프로젝트

### 정리

~~~~
워드프레스에서 지원하는 마크다운 문법
http://blog.kalkin7.com/2014/02/05/wordpress-markdown-quick-reference-for-koreans/

버전규칙
http://seorenn.blogspot.kr/2012/02/version.html

sendMessage만하면 전송되도록 만든다.

input type        hidden name _token

쿠키 또는 세션. 모든 폼에다가 일정한 약속의 네임을 준다.

csrf

sms남발우려

csrf가 있는데 직

세션에넣어놓고 비교하거나

코드이그나이터 프레임워크가 되도 

키 벨류
form_open()  코드이그나이트 사용하면 CSRF

다른 사람이  

도메인이 다르면 세션이 맞을 수 없다. 서브 도메인. 크로스 사이트 정책 위반


중간매개

쿠키에다가 id password 집어넣어 

블레이드 템플릿

공개해서 작업한다 싶으면 CSRF사용하라


www.ciboard.co.kr

1.0 alpa tag 작동완성시켜서 dev테스트 완료되었다. 

yona
k보드  

현재는 

plugins 파일, README.md 파일 에 묶어서 

1.0.1 메이져버전,  규칙 README.md에 적어놓기.

~~~~

### 일지
+ 이제 좀 이해가 되니 개발하는데 재미있다.  답답함이 조금 사라졌다.

## 20180125
+ JavaScript 공부한 git 사이트 **https://github.com/gkagm2/JavaScriptStudy.git**

### 진도
+ JavaScript 공부
+ gallery site 소스 분석

### 정리
+ 씨아이보드 : 코드이그나이터를 기반으로 하여 웹 사이트를 구축하고 하는 사람들에게 편리한 CMS를 제공해주는 사이트다. 씨아이보드는 코드이그나이터를 기반으로 만든 CMS, 게시판 플랫폼입니다. MVC 모델로 구성된 이 CMS 는 기능별로 디렉토리가 정확히 구별되어 함수관리, 스킨관리가 용이합니다.


+ CMS : (Contents Management System)콘텐츠관리시스템. 웹사이트를 구성하고 있는 다양한 콘텐츠를 효율적으로 관리할 수 있도록 도와주는 시스템. 

+ JavaScript

~~~~
사용자가 어떤 버튼을 클릭했을 때 어떠한 일이 일어나도록 하고 싶으면 php, java, python을 하고 있으면 안됨. JavaScript를 해야 됨. 

자바 스크립트가 유일함.

탈웹브라우저? :

브라우저에서 동작하는 클라이언트 사이드 ,서버쪽에서 동작하는 서버 사이드

웹에서 사용하다가 웹 바깥쪽에서도 사용가능하다. 탈웹.
대표적인 예 : google apps script이다.

구글 스프레드시트->도구->스크립트 편집기->빈 프로젝트  : 코드 작성할 수 있음.

function onOpen(){
	var name = Browser.msgBox(‘Hello world’);
}

언어를 사용하는 대상 : 

node.js의 wrtie(‘Hello world’);
javacript는 alert(‘Hello world’);
google apps script는 msgBox(‘Hello world’);

할 수 있는 일이 다르다. 

서버쪽 -> node.js 

alert(‘  ~~’);  : 알림창을 띄운다.

자바스크립트에서는 큰따옴표나 작은따옴표가 붙지 않은 숫자는 숫자로 인식한다.
alert(1+1);
alert(1.2 + 1.3);

자바스크립트에서는 사칙연산 보다 좀 더 복잡한 연산도 지원한다. 
Math.pow(3,2); // 9, 3의 2승
Math.round(10.6); // 11, 10.6을 반올림
Math.ceil(10.2); // 11, 10.2를 올림
Math.floor(10.6); // 10, 10.6을 내림
Math.sqrt(9); // 3, 3의 제곱근
Math.random(); // 0부터 1.0 사이의 랜덤한 숫자

자바 스크립트 문자
alert(“coding”);
alert(‘coding’);

이런 식으로 써야 됨
alert(“ egoing’s coding”);
alert(‘ egoing”s coding ‘);
alert(‘ eoging\’s coding’);
\’ <- escape 문장 

typeof() ;  : type을 알 수 있다. 
typeof 2;  : number라고 뜸

alert(‘coding’.length); : 문자 길이를 구할 때 문자 뒤에 .length를 붙인다.

문자와 문자를 더할 때 alert(‘codd’ + ‘everbody’);  문자 사이에 ‘+’를 붙인다.

‘==’ 동등 연산자로 좌항과 우항을 비교해서 서로 값이 같다면 true 다르다면 false가 된다.
=가 2개임. 
alert(1==2) //false
alert(1==1) //true
alert("one"=="two") //false
alert("one"=="one") //true

‘===’ 일치연산자로 좌항과 우항이 ‘정확’하게 같을 때 true 다르면 false가 된다.
alert(1=='1'); //true
alert(1==='1'); //false
데이터 형도 같아야만됨
alert(null == undefined); //true
alert(null === undefined); //false
alert(true == 1); //true
alert(true === 1); //false
alert(true == '1'); //true
alert(true === '1'); //false
alert(0 === -0); //true
alert(NaN === NaN); //false

NaN은 0/0과 같은 연산의 결과로 만들어지는 특수한 데이터 형인데 숫자가 아니라는 뜻

!=
'!'는 부정을 의미한다. '같다'의 부정은 '같지 않다'이다. 이것을 기호로는 '!='로 표시한다. 아래의 결과는 !=의 결과인데 ==와 정반대의 결과를 보여준다.

alert(1!=2); //true
alert(1!=1); //false
alert("one"!="two"); //true
alert("one"!="one"); //false

'!=='는 '!='와 '=='의 관계와 같다. 정확하게 같지 않다는 의미다. 예제는 생략한다.

document.write는 자바스크립트를 이용해서 웹페이지에 텍스트를 출력한다. 이것은 웹브라우저에서만 동작할 것이다. node.js 콘솔과 같은 환경에서 실습을 한다면 console.log와 같은 메소드를 대신 사용한다.

배열 : 
var member = [‘jang’,’hyeon’,’myeong’]; 으로 선언

member.length 하면 배열의 개수를 구할 수 있다.


member.push(‘f’);를 하면 member 배열 끝에 f 원소가 추가된다.

member = member.concat([‘f’,’g’]);를 하면 복수의 원소를 배열에 추가한다.

member.unshift(‘z’);를 하면 z의 원소가 맨	 앞에 추가된다.

두번째 인덱스 뒤에 대문자 B를 넣고 싶다면 splice는 첫 번째에 해당하는 원소부터 두번째 인자에 해당하는 원소의 숫자만큼의 값을 배열로부터 제거한 후에 리턴한다. 그리고 세 번째 인자부터 전달된 인자들을 첫 버째 인자의 원소 뒤에 추가한다.
member.splice(2,0,’B’);
a,b,B,c,e,d가 된다.

객체에는 객체를 담을수도 있고, 함수도 담을 수 있다

모듈의 사용
greeting.js 파일에
function wecome(){
	return “Hello world”;
}

main.html 파일에
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<script src="greeting.js"></script>
</head>
<body>
<script>
alert(welcome());
</script>
</body>
</html>


라이브러리: 라이브러리는 모듈과 비슷한 개념이다. 모듈이 프로그램을 구성하는 작은 부품으로서의 로직을 의미한다면 라이브러리는 자주 사요되는 로직을 제사용하기 편리함



exports.area = function (r) {
   return PI * r * r;
}
var PI = Math.PI;


jquery는 모든것을 $로 시작한다.


$(‘#list li’);
id : list 하위태그 li

정규표현식 
정규표현식은 두가지 단계로 나눠짐. 하나는 컴파일, 다른 하나는 실행이다. 

~~~~

### 일지
+ 씨아이보드 :  http://www.ciboard.co.kr
+ 자바스크립도 후딱 끝내서 개발할 때 몰라서 막히지 않았으면 좋겠다.

## 20180126
+ JavaScript 공부한 git 사이트 **https://github.com/gkagm2/JavaScriptStudy.git**

### 진도
+ JavaScript 함수, 배열, 객체, 모듈, UI와 API 그리고 문서보는 법
+ JavaScript 정규표현식, 함수지향, 유효범위, 값으로서의 함수와 콜백, 클로저
+ JavaScript arguments, 함수의 호출, 객체지향, 객체지향 프로그래밍, 생성자와 new, 전역객체, this, 상속

### 정리
+ JavaScript에서는 함수도 객체다. 다시 말해서 일종의 값이다.
+ JavaScript의 함수가 다른 언어의 함수와 다른 점은 함수가 될 수 있다는 점이다. 함수를 값으로 사용가능하다. 배열의 값으로도 사용이 가능하다.
+ console.log() : 콘솔로 출력 (크롬의 개발자 도구에서 console에서 확이할 수 있음)
+ 처리의 위임

~~~~
비동기 처리 : 
콜백은 비동기처리에서도 유용하게 사용된다. 시간이 오래걸리는 작업이 있을 때 이 작업이 완료된 후에 처리해야 할 일을 콜백으로 지정하면 해당 작업이 끝났을 때 미리 등록한 작업을 실행하도록 할 수 있다. 

콜백함수 - 함수가 다른 함수의 인자로 사용됨으로써 그 함수의 내용을 완전히 바꿀 수 있는것.
비동기(Asynchronous) - 요청에 처리 완료와 관계없이 응답한다. 이후 운영체제에서 응답할 준비가 되면 응답한다.
~~~~

+ 클로저 : 클로저(closure)는 내부함수가 외부함수의 맥락(context)에 접근할 수 있는 것을 가르킨다. 클로저는 자바스크립트를 이용한 고난이도의 테크닉을 구사하는데 필수적인 개념으로 활용된다.

~~~~
클로저 참고
https://developer.mozilla.org/ko/docs/JavaScript/Guide/Closures
http://ejohn.org/apps/learn/#48
http://blog.javarouka.me/2012/01/javascripts-closure.html
~~~~

+ 객체 :객체란 서로 연관된 변수와 함수를 그룹핑한 그릇이라고 할 수 있다. 객체 내의 변수를 프로퍼티(property), 함수를 메소드(method)라고 부른다.

+ 생성자란 객체를 만드는, 정의하는 함수로 생성자 안에 생성될 객체의 속성 및 메소드(함수)를 정의 할 수 있다.(초기화)
이 방법을 통해 같은 맥락을 가진 객체를 여러개 생성 할 때 코드의 재활용성을 높여준다.
*this는 해당 메소드를 포함하고 있는 변수를 가리킨다.

+ 전역객체 : 자바스크립트에서 모든 변수, 함수는 window라는 객체의 프로퍼티, 메소드인데 이 객체를 전역객체라 한다.
전역객체는 암시적으로 모든 변수, 함수에 쓰이므로 생략이 가능하다.

+ this : 함수 내에서 함수 호출 맥락(context)를 의미한다. 맥락이란 것은 상황에 따라서 달라진다는 의미인데 즉 함수를 어떻게 호출하느냐에 따라서 this가 가리키는 대상이 달라진다는 뜻이다. 함수와 객체의 관계가 느슨한 자바스크립트에서 this는 이 둘을 연결시켜주는 실질적인 연결점의 역할을 한다.



### 일지
+ JQuery도 배워야겠다.
+ JavaScript가 생각보다 어렵다. Java나 C++의 객체지향과는 많이 다르다. 상속 관점에서도 자바 스크립에는 객체만이 유일한 생성체이다.


## 20180129
+ JavaScript 공부한 git 사이트 **https://github.com/gkagm2/JavaScriptStudy.git**
+ NodeJs 공부한 git 사이트 **https://github.com/gkagm2/NodeJsStudy.git**

### 진도
+ JavaScript prototype, 표준 내장 객체의 확장, Object
+ 서버측 JavaScript와 NodeJs의 소개
+ nodejs설치 및 실행 (windows, linux 환경)
+ 간단한 웹 애플리케이션 만들기.

### 정리
+ 아래와 같은 코드를 입력하고 nodejs를 이용하여 실행시키면 1337 port로 웹 서버를 이용할 수 있다.

~~~~
const http = require('http');

const hostname = 'localhost';
const port = 1337;

http.createServer((req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/plain'});
    res.end('Hello World\n');
}).listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
})
~~~~

### 일지
+ javascript... 코드의 느낌이 이상하다. 
+ Windows환경에서는 nodejs설치시 간단함.
+ Ubuntu에서 nodejs를 설치해봄. 버전이 낮음.  버전관리를해주는 nvm을 통하여 최신 버전을 유지할 수 있는 것 같다. 방법을 알아봐 함.
+ nodejs로 포트별로 서버를 만들 수 있다. docker도 이와같은 방법을 응용하여 만든것인가?
+ 왜 nodejs를 사용하는지 알 것 같다.
+ 위에 적혀있는 git 링크로 들어가면 볼 수 있음.

## 20180130
+ JavaScript 공부한 git 사이트 **https://github.com/gkagm2/JavaScriptStudy.git**
+ NodeJs 공부한 git 사이트 **https://github.com/gkagm2/NodeJsStudy.git**

### 진도
+ 콜백(callback)함수
+ 동기와 비동기 프로그래밍
+ Express-도입
+ Express-설치
+ Express-간단한 웹 애플리케이션 만들기

### 정리
+ 위에 github 링크에 있는 사이트에 정리해놨다.
### 일지
+ 웬만하면 다음에 찾아볼 때 바로 떠올릴 수 있을 정도로 문서를 작성하고 싶지만 시간이 상당히 오래걸림. 저울질이 중요하군..





+ 먹어본 음식

~~~~
일본라면, 오리볶음밥, 잡채밥, 부대찌개, 제육덮밥, 피자무한리필, 햄버거, 커피겁내게 큰 싸이즈, 어떤 콩나물제육볶음같은것인데 이름이 기억이안남, 짬뽕, 회전초밥, 고기 무한리필, kfc 햄버거, 돼지찌개, 맥도날드 상하이버거  etc

다 얻어먹는것들인데 먹을곳이 엄청 많다 맛집투어하는 느낌
~~~~
