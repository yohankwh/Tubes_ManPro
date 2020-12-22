@extends('layouts.infoedu')
@section('custom')
<style>

.column4 {
  float: left;
  width: 25%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.column4Text {
  float: left;
  width: 70%;
  margin-left:5%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.column5Text {
  float: left;
  width: 70%;
  margin-right:5%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.column2 {
  float: left;
  width: 47.5%;
  padding: 10px;
  background-color:white;
  height: 150px; /* Should be removed. Only for demonstration */
}

.column3 {
  float: left;
  margin-right:50px;
  width: 100%;
  padding: 10px;
  background-color:white;
  height: 150px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

a:hover{
  text-decoration:none;
  background-color:#f5f6f7;
  color:black;
}

.center{
  margin: auto;
  width: 95%;
  background-color:#3B9778;
  color:white;
  padding:20px;
}

.center2{
  margin: auto;
  width: 95%;
  background-color:#93E9BE;
  color:black;
  padding:20px;
}

.center3{
  margin: auto;
  width: 95%;
  color:black;
  padding:20px;
}

button{
  background-color:#F4B18C;
  border:none;
  border-radius:40px;
  padding:0px 15px 0px 15px;
}

button:hover{
  background-color:#e3a481;
}
</style>
@endsection
@section('content')
<div class="row" style="margin:20px 20px 100px 20px">
  <div class="column" style="max-width:600px; margin-right:10px;">
    <img class="mySlides w3-animate-fading w3-round-xlarge w3-card-4" src="img/infoedu_carousel_1.jpg" style="width:100%;">
    <img class="mySlides w3-animate-fading w3-round-xlarge w3-card-4" src="img/infoedu_carousel_2.jpg" style="width:100%">
    <img class="mySlides w3-animate-fading w3-round-xlarge w3-card-4" src="img/infoedu_carousel_3.jpg" style="width:100%">
  </div>
  <div class="column" style="margin-top:10px;"> 
    <div class="row">
      <a href="#" class="column2 w3-round-xlarge w3-panel w3-card-4 w3-margin-right w3-padding-large">
        <h3>콜센터</h3>
        <h6>Call Center</h6>
        <p>119</p>
      </a>
      <a href="#" class="column2 w3-round-xlarge w3-panel w3-card-4 w3-margin-right w3-padding-large">
        <h3>WhatsApp 에서 채팅</h3>
        <h6>Chat on WhatsApp</h6>
        <p>119</p>
      </a>
      <a href="#infosection" class="column3 w3-round-xlarge w3-panel w3-card-4 w3-margin-right w3-padding-large">
        <h3>이 상황에서 무엇을해야합니까?</h3>
      </a>
    </div>
  </div>
</div>

<br>
<h2 class="w3-center"id="infosection"><b>해야 할 일</b></h2>
<div class="center w3-container w3-round-large w3-card-4 w3-white" style="margin-top:50px;">
  <h3><b>COVID-19의 위험성 파악</b></h3>
  <p>COVID-19는 2019 년 신종 코로나 바이러스에 의해 발생하는 질병으로, 
  감기와 유사한 증상이 있지만 지금까지 COVID-19는 사망률이 더 높습니다. 
  바이러스는 또한 증상이 나타나기 전에 사람간에 전염 될 수 있기 때문에 
  매우 빠르게 퍼집니다.<a href="#" class="w3-text-red">전부</a></p>
  <button>
    <a href="#" ><h5>증상 확인</h5></a>
  </button>
</div>
<br>
<h2 class="w3-center"><b>알아야 할 사항</b></h2>
<div class="center2 w3-container w3-round-large w3-card-4 w3-white" style="margin-top:50px;">
  <h3><b>조짐</b></h3>
  <p>COVID-19는 신종 코로나 바이러스 (2019-nCoV)에 의해 발생하는 질병으로, 사람이 감기에서 중동 호흡기 증후군 (MERS) 및 중증 급성 호흡기 증후군 ( SARS).
    2020 년 2 월 11 일, 세계 보건기구 (WHO)는 2019-nCov로 인한 질병의 이름, 즉 코로나 바이러스 질병 (COVID-19)을 발표했습니다..</p>
  <h3><b>COVID-19는 무엇입니까 ?</b></h3>
  <p>일반적인 증상으로는 38 ° C 이상의 발열, 마른 기침, 숨가쁨 등이 있습니다. 
  증상이 나타나기 전 14 일 이내에 감염된 국가를 여행했거나 COVID-19에 걸린 
  사람을 돌 보거나 친밀한 접촉을 한 사람이있는 경우 그 사람은 진단을 확인하기 
  위해 추가 실험실 검사를 받게됩니다.</p>
  <h3><b>전염</b></h3>
  <p>사람은 COVID-19에 감염 될 수 있습니다. 이 질병은 기침이나 재채기를 할 때 코나 
  입에서 나오는 작은 물방울을 통해 퍼질 수 있습니다. 그런 다음 물방울이 주변 물체에 
  떨어집니다. 그런 다음 다른 사람이 물방울로 오염 된 물체를 만지면 그 사람이 눈, 코 
  또는 입 (삼각형 얼굴)을 만지면 해당 사람이 COVID-19에 감염 될 수 있습니다. 사람이 
  실수로 환자의 물방울을 흡입했을 때 COVID-19에 감염 될 수도 있습니다. 그렇기 때문에 
  아픈 사람과 최대 1 미터 정도의 거리를 유지하는 것이 중요합니다.</p>
</div>
<br>
<div class="center w3-container w3-round-large w3-card-4 w3-white" style="margin-top:50px;">
<div class="center w3-white">
  <h2><b>코로나 19로부터 보호</b></h2><br>
  <div class="row">
    <div class="column4">
      <img src="img/infoedu_info_1.jpg" alt="" style="width:100%;" class="w3-round-xlarge w3-card-4">
    </div>
    <div class="column4Text">
      <h3><b>1. 사회적 거리두기</b></h3><br>
      <p>사회적 거리두기는 건강한 사람들이 붐비는 장소에 대한 방문을 제한하고 다른 
      사람들과의 직접 접촉을 제한하도록 장려함으로써 코로나 바이러스 감염을 예방하고 
      통제하는 단계 중 하나입니다. 이제 사회적 거리두기라는 용어는 정부에 의해 물리적 
      거리두기로 대체되었습니다.</p>
    </div> <br>
    <div class="column5Text">
    <h3><b>2. 집에있어</b></h3><br>
      <p>코로나 19 확산의 사슬을 끊는 프로그램입니다. 집에 있으면 Covid-19를 피할 수 있기 때문입니다.</p>
    </div>
    <div class="column4">
      <img src="img/infoedu_info_2.jpg" alt="" style="width:100%;" class="w3-round-xlarge w3-card-4"> 
    </div> <br>
    <div class="column4">
      <img src="img/infoedu_info_3.jpg" alt="" style="width:100%;" class="w3-round-xlarge w3-card-4">
    </div>
    <div class="column4Text">
      <h3><b>3. 손을 씻으세요</b></h3><br>
      <p>적어도 20-30 초 동안 손을 씻어야합니다. 시간을 측정하는 쉬운 방법은 생일 축하 노래를 두 번 부르는 것입니다.
        손 소독제의 경우도 마찬가지입니다. 알코올이 60 % 이상 함유 된 소독제를 사용하고 손에 20 초 이상 문지르면 완전히
        덮입니다.</p>
    </div> <br>
    <div class="column5Text">
    <h3><b>4. 마스크를 쓰다</b></h3><br>
      <p>아프지 않더라도 마스크를 착용해야합니다. 여러 연구에 따르면 증상이 전혀 발생하지 않는 (무증상) COVID-19 
      환자와 아직 증상이 나타나지 않는 사람 (증상 전)이 여전히 다른 사람에게 바이러스를 전파 할 수 있다는 사실이 
      밝혀 졌기 때문입니다. 마스크를 착용하면 감염되었지만 증상이 나타나지 않는 경우 주변 사람들을 보호하는 
      데 도움이됩니다.</p>
    </div>
    <div class="column4">
      <img src="img/infoedu_info_4.jpg" alt="" style="width:100%;" class="w3-round-xlarge w3-card-4"> 
    </div> <br>
  </div>
</div>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 10000);    
}
</script>
@endsection

