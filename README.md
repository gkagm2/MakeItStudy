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
+ 파일　다루는　방법
+ bootstrap　사용법

### 정리
+ bootstrap은　무엇인가？　반응형이며　모바일　우선인　웹　프로젝트　개발을　위한　HTML, CSS, JS 프레임워크이다．
+ 　bootstrap은　jquery기반에서　만들어진　library이기　때문에　jquery를　로드해야한다．
+ 　jquery를　load 하기위한　자비스크립트의　코드　：　<script src="~~"></script>
+ twitter bootstrap은　html코드에다가　class name만　부트스트랩에서　제시하는대로　작성만　하면　그　class에　맞게　html문서를　알아서　디자인　해주는　것이　가장　중요한　기능성이다．
+ url부분에　index.php감추는　법　： .htaccess파일을　루트　파일에　생성한　후　아래의　내용을　입력하여　저장한다．　
------------------------- 
dule mod_rewrite.c>
   RewriteEngine On
RewriteBase /
RewriteCond $1 !^(index\.php|images|captcha|data|include|uploads|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php/$1 [L]
</IfModule>
-------------------------

### 일지
+ 생활코딩에서　하는대로　따라해도　안되는　문제가　발생하여　시간을　많이　잡아먹음．
+ 대부분　개발할때　MVC패턴으로　개발한다고　함．　중요하다
+ Ubunu로　비트나미　서버를　만든　후　실행은　되지만　windows에서　그대로　파일을　옮긴터라　특정　파일　부분의　페이지가　뜨지　않음　집가서　찾아봐야될　듯　함

