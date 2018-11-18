<?php
session_start();
?>
<html lang="en">
<title>ClimateChange.org</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.2.0/css/ol.css" type="text/css">
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.2.0/build/ol.js"></script>

<body>

<!-- Navbar -->
<div class="w3-bar">

  <!-- Navbar on small screens -->
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a href="register.php" class="w3-bar-item w3-button w3-padding-large">Register</a>
    <a href="downloads.php" class="w3-bar-item w3-button w3-padding-large">Downloads</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Sign In</a>
    <a href="About-Us.php" class="w3-bar-item w3-button w3-padding-large">About Us</a>
    <?php if(isset($_SESSION['user_id'])) echo "<a href='logout.php' class='w3-bar-item w3-button w3-padding-large' style='float: right;'>Logout</a>"
      ?>
  </div>

</div>

<!-- Header -->
<header class="w3-container w3-center" style="padding:480px 16px;background-image: url('bg1.jpg');">
    <input type="button" onclick="location.href='#intro';" value="Get Started" class="w3-button w3-black w3-padding-large w3-large w3-margin-top"/>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container" style="background-color:lightblue" id="intro">
  <div class="w3-content">
    <div class="w3-container w3-center">
      <h1>Introduction</h1>
      <h5 class="w3-padding-32 ">Climate change is a change in the statistical distribution of weather patterns when that change lasts for an extended
    period of time (i.e., decades to millions of years). Climate change may refer to a change in average weather
    conditions, or in the time variation of weather within the context of longer-term average conditions.
    </h5>
    <p>Climate Change is currently identified as one of the biggest threats the entire world is facing.If We don't act fast, then thousands of species can become extinct along with catastrophic events which can destory all of humanity</p>
    <h2 style="font-weight: bold;">It is Now or Never !</h2>
    <p>This website is intended to create awareness about the situation and describe the temperature changes which have been taking place in the past few decades. Also with advanced Machine Learning Algorithms an attempt has been made to predict the future temperatures</p>
    </div>
    <div class="w3-container w3-center">
      <form method="POST" action="world.php">
              <input type="text" class="w3-input" name="year" placeholder="Enter Year to get Started !" style="width: 50%;margin: auto">
              <input type="submit" value="Get World Report" class="w3-button w3-black w3-padding-large w3-large w3-margin-top" />
      </form>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container w3-center">
    <div class="w3-content w3-center">
        <div id="map" ></div>
        <br>
        <div class="w3-bar w3-center">
          <button id='fly-to-bern' class="w3-button w3-black w3-center" >Bern</button>
          <button id='fly-to-bangalore'class="w3-button w3-black w3-center">Bangalore</button>
          <button id='fly-to-chennai' class="w3-button w3-black w3-center" >Chennai</button>
          <button id='fly-to-delhi' class="w3-button w3-black w3-center" >Delhi</button>
          <button id='fly-to-newyork' class="w3-button w3-black w3-center" >New York</button>
          <button id='fly-to-mumbai' class="w3-button w3-black w3-center" >Mumbai</button>
          <button id='fly-to-singapore' class="w3-button w3-black w3-center" >Singapore</button>
          <button id='fly-to-moscow' class="w3-button w3-black w3-center" >Moscow</button>
        </div>
        <br>
        <div class="w3-bar w3-center">
          <button id='fly-to-tokyo' class="w3-button w3-red w3-center" >Tokyo</button>
          <button id='fly-to-shanghai' class="w3-button w3-red w3-center" >Shanghai</button>
          <button id='fly-to-surat' class="w3-button w3-red w3-center" >Surat</button>
          <button id='fly-to-kolkata' class="w3-button w3-red w3-center" >Kolkata</button>
          <button id='fly-to-canberra' class="w3-button w3-red w3-center" >Canberra</button>
          <button id='fly-to-paris' class="w3-button w3-red w3-center" >Paris</button>
          <button id='fly-to-berlin' class="w3-button w3-red w3-center" >Berlin</button>
        </div>
        <br>
        <form method="POST" id="city_form">
          <input type="text" id="city_name" name="city" style="display: none">
          <input type="text" id="lat" style="display: none" name="lat">
          <input type="submit" id="submit" style="display: none">
        </form>
        <div class="w3-bar w3-center"><button id='tour' class="w3-button w3-green w3-center">Tour</button></div>
        <br>
        <br>
        <div class="w3-container w3-center" >
                  <form id="city_form2" method="post">
                    <input type="text" class="w3-input" name="city" id="city_name2" placeholder="Enter City Name" style="width: 50%;margin: auto">
                    <input type="text" id="lat1" style="display: none" name="lat">
                    <input type="submit" id="submit3" name="submit3" value="submit" class="w3-btn w3-black w3-center" style="display: none">
                  </form>
                  <button id="submit2" class="w3-btn w3-black w3-center">Submit</button>
        </div>
    </div>
</div>


<!-- Footer -->
<div class="w3-padding-32 w3-center w3-green">
    Contact Us : <address>
        <strong>PES University</strong><br>
        100 Feet Ring Road,
        BSK III Stage,Bangalore-560085<br>
        Phone : +91 80 26721983
    </address>
            <address>
                <strong>Email</strong><br>
                <a href="mailto:#">skandavc18@gmail.com</a>
            </address>
 </div>
<script>
  var done = function () { };
    function getMinZoom() {
      var width = window.innerHeight;
      return Math.ceil(Math.LOG2E * Math.log(width / 256));
    }
    var initialZoom = getMinZoom();
    var Bern = ol.proj.fromLonLat([8.29, 47.42]);
    var Bangalore = ol.proj.fromLonLat([77.26, 12.05]);
    var Chennai = ol.proj.fromLonLat([80.27, 13.66]);
    var Delhi = ol.proj.fromLonLat([77.10, 28.13]);
    var NewYork = ol.proj.fromLonLat([-74.00, 40.99]);
    var Mumbai = ol.proj.fromLonLat([72.87, 18.48]);
    var Singapore = ol.proj.fromLonLat([103.81, 0.8]);
    var Moscow = ol.proj.fromLonLat([37.61, 55.45]);
    var Tokyo = ol.proj.fromLonLat([139.69, 35.17]);
    var Shanghai = ol.proj.fromLonLat([121.47, 31.35]);
    var Surat = ol.proj.fromLonLat([72.83, 21.7]);
    var Kolkata = ol.proj.fromLonLat([88.36, 23.31]);
    var Canberra = ol.proj.fromLonLat([149.13, -36.17]);
    var Paris = ol.proj.fromLonLat([2.35, 49.03]);
    var Berlin = ol.proj.fromLonLat([13.40, 52.24]);
    var view = new ol.View({
      center: ol.proj.fromLonLat([37.41, 8.82]),
      zoom: initialZoom + 2,
      minZoom: initialZoom
    });
   var dict={'rhus': 57.05, 'orlu': 40.99, 'orum': 40.99, 'skemen': 50.63, 'rmqi': 44.2, 'A Corua': 42.59, 'Aachen': 50.63, 'Aalborg': 57.05, 'Aba': 5.63, 'Abadan': 29.74, 'Abakaliki': 5.63, 'Abakan': 53.84, 'Abbotsford': 49.03, 'Abengourou': 7.23, 'Abeokuta': 7.23, 'Aberdeen': 57.05, 'Abha': 18.48, 'Abidjan': 5.63, 'Abiko': 36.17, 'Abilene': 32.95, 'Abohar': 29.74, 'Abomey Calavi': 7.23, 'Abu Dhabi': 24.92, 'Abuja': 8.84, 'Acapulco': 16.87, 'Acarigua': 8.84, 'Accra': 5.63, 'Achalpur': 21.7, 'Acheng': 45.81, 'Achinsk': 57.05, 'Acua': 29.74, 'Adana': 36.17, 'Addis Abeba': 8.84, 'Adelaide': -34.56, 'Aden': 13.66, 'Adilabad': 20.09, 'Adiwerna': -7.23, 'Adoni': 15.27, 'Afyonkarahisar': 39.38, 'Agadir': 29.74, 'Agartala': 23.31, 'Agboville': 5.63, 'Ageo': 36.17, 'Agra': 26.52, 'Aguascalientes': 21.7, 'Ahmadabad': 23.31, 'Ahmadnagar': 18.48, 'Ahmadpur East': 29.74, 'Ahvaz': 31.35, 'Aix En Provence': 44.2, 'Aizawl': 23.31, 'Ajdabiya': 31.35, 'Ajmer': 26.52, 'Akashi': 34.56, 'Akishima': 36.17, 'Akita': 39.38, 'Akola': 20.09, 'Akron': 40.99, 'Aksaray': 37.78, 'Aksu': 40.99, 'Aktau': 44.2, 'Akure': 7.23, 'Akyab': 20.09, 'Alagoinhas': -12.05, 'Alandur': 13.66, 'Alanya': 36.17, 'Alappuzha': 8.84, 'Albacete': 39.38, 'Alberton': -26.52, 'Albuquerque': 34.56, 'Albury': -36.17, 'Alcal De Henares': 40.99, 'Alcobendas': 40.99, 'Alcorcn': 40.99, 'Aleppo': 36.17, 'Alexandria': 31.35, 'Algeciras': 36.17, 'Algiers': 36.17, 'Aligarh': 28.13, 'Allahabad': 24.92, 'Allentown': 40.99, 'Almaty': 42.59, 'Almera': 36.17, 'Almere': 52.24, 'Almetyevsk': 55.45, 'Alor Setar': 5.63, 'Altay': 47.42, 'Alwar': 28.13, 'Amadora': 39.38, 'Amagasaki': 34.56, 'Amaigbo': 5.63, 'Amarillo': 34.56, 'Ambala': 29.74, 'Ambarnath': 18.48, 'Ambato': -0.8, 'Ambattur': 13.66, 'Ambon': -4.02, 'Ambur': 12.05, 'Americana': -23.31, 'Amersfoort': 52.24, 'Amiens': 49.03, 'Amol': 36.17, 'Amravati': 21.7, 'Amritsar': 31.35, 'Amroha': 28.13, 'Amsterdam': 52.24, 'Anpolis': -16.87, 'Anaco': 8.84, 'Anaheim': 32.95, 'Anand': 23.31, 'Ananindeua': -0.8, 'Anantapur': 15.27, 'Anbu': 23.31, 'Anchorage': 61.88, 'Ancona': 44.2, 'Anda': 45.81, 'Andijon': 40.99, 'Angarsk': 52.24, 'Angeles': 15.27, 'Angers': 47.42, 'Angra Dos Reis': -23.31, 'Angren': 40.99, 'Anjo': 34.56, 'Ankang': 32.95, 'Ankara': 39.38, 'Ann Arbor': 42.59, 'Anqing': 31.35, 'Anqiu': 36.17, 'Anshan': 40.99, 'Anshun': 26.52, 'Antakya': 36.17, 'Antalya': 37.78, 'Antananarivo': -18.48, 'Antioch': 37.78, 'Antipolo': 15.27, 'Antofagasta': -23.31, 'Antsirabe': -20.09, 'Antwerp': 50.63, 'Anyama': 5.63, 'Anyang': 36.17, 'Apeldoorn': 52.24, 'Apodaca': 26.52, 'Apopa': 13.66, 'Apucarana': -23.31, 'Aqtbe': 50.63, 'Ara': 24.92, 'Araatuba': -21.7, 'Aracaju': -10.45, 'Arad': 45.81, 'Araguana': -7.23, 'Arak': 34.56, 'Arapiraca': -10.45, 'Araraquara': -21.7, 'Araras': -21.7, 'Araruama': -23.31, 'Araucria': -24.92, 'Ardabil': 37.78, 'Arequipa': -16.87, 'Arica': -18.48, 'Arjawinangun': -7.23, 'Arkhangelsk': 65.09, 'Arlington': 32.95, 'Armavir': 45.81, 'Armenia': 4.02, 'Arnhem': 52.24, 'Arusha': -4.02, 'Arvada': 39.38, 'Aryanah': 36.17, 'Arzamas': 55.45, 'Asahikawa': 44.2, 'Asaka': 36.17, 'Asansol': 23.31, 'Asfi': 32.95, 'Asgabat': 37.78, 'Ashdod': 31.35, 'Ashikaga': 36.17, 'Ashqelon': 31.35, 'Asmara': 15.27, 'Astana': 50.63, 'Astanajapura': -7.23, 'Astrakhan': 45.81, 'Asuncin': -24.92, 'Aswan': 23.31, 'Asyut': 26.52, 'Athens': 37.78, 'Atibaia': -23.31, 'Atlanta': 34.56, 'Atsugi': 36.17, 'Atyrau': 47.42, 'Auckland': -36.17, 'Augsburg': 47.42, 'Aurangabad': 20.09, 'Aurora': 39.38, 'Austin': 29.74, 'Avadi': 13.66, 'Awassa': 7.23, 'Awka': 5.63, 'Ayacucho': -13.66, 'Ayer Itam': 5.63, 'Azamgarh': 26.52, 'Azare': 12.05, 'Bnin': 7.23, 'Babakan': -7.23, 'Babol': 36.17, 'Bac Lieu': 8.84, 'Bacau': 45.81, 'Bacolod': 10.45, 'Bacoor': 15.27, 'Badajoz': 39.38, 'Badalona': 40.99, 'Badaojiang': 42.59, 'Badlapur': 18.48, 'Bafoussam': 5.63, 'Bagaha': 26.52, 'Baghdad': 32.95, 'Baglan': 36.17, 'Bago': 16.87, 'Baguio': 16.87, 'Bahadurgarh': 28.13, 'Baharampur': 23.31, 'Bahawalnagar': 29.74, 'Bahawalpur': 29.74, 'Bahia Blanca': -39.38, 'Bahir Dar': 12.05, 'Bahraich': 28.13, 'Baia Mare': 47.42, 'Baicheng': 45.81, 'Baidyabati': 23.31, 'Baiyin': 36.17, 'Bakersfield': 36.17, 'Baku': 40.99, 'Balakovo': 52.24, 'Balashikha': 55.45, 'Baleshwar': 21.7, 'Balikpapan': -0.8, 'Baliuag': 15.27, 'Ballia': 26.52,
      'Bally': 23.31, 'Balti': 47.42, 'Baltimore': 39.38, 'Balurghat': 24.92, 'Bama': 12.05, 'Bamako': 12.05, 'Bamenda': 5.63, 'Banda': 24.92, 'Banda Aceh': 5.63, 'Bandar E Anzali': 37.78, 'Bandar Maharani': 2.41, 'Bandar Penggaram': 2.41, 'Bandundu': -4.02, 'Bandung': -7.23, 'Baneh': 36.17, 'Bangalore': 12.05, 'Bangaon': 23.31, 'Bangkok': 13.66, 'Bangui': 4.02, 'Banja Luka': 44.2, 'Banjaran': -7.23, 'Banjarmasin': -4.02, 'Bankura': 23.31, 'Bansbaria': 23.31, 'Bantou': 24.92, 'Banyuwangi': -8.84, 'Baoding': 39.38, 'Baoji': 34.56, 'Baoshan': 47.42, 'Barakpur': 23.31, 'Baranagar': 23.31, 'Barasat': 23.31, 'Barbacena': -21.7, 'Barcelona': 40.99, 'Barddhaman': 23.31, 'Bareli': 28.13, 'Bari': 40.99, 'Barinas': 8.84, 'Baripada': 21.7, 'Barisal': 23.31, 'Barnala': 29.74, 'Barnaul': 53.84, 'Barquisimeto': 10.45, 'Barra Mansa': -21.7, 'Barrancabermeja': 7.23, 'Barranquilla': 10.45, 'Barreiras': -12.05, 'Barretos': -20.09, 'Barrie': 44.2, 'Barsi': 18.48, 'Barueri': -23.31, 'Baruta': 10.45, 'Basel': 47.42, 'Basildon': 52.24, 'Basirhat': 23.31, 'Basti': 26.52, 'Bat Yam': 31.35, 'Bata': 2.41, 'Batala': 31.35, 'Batangas': 13.66, 'Bataysk': 47.42, 'Batman': 37.78,
      'Baton Rouge': 29.74, 'Baturaja': -4.02, 'Bauchi': 10.45, 'Bauru': -21.7, 'Bayamo': 20.09, 'Bayrut': 34.56, 'Beaumont': 29.74, 'Beawar': 26.52, 'Begusarai': 24.92, 'Beian': 47.42, 'Beibei': 29.74, 'Beihai': 21.7, 'Beipiao': 40.99, 'Beira': -20.09, 'Beirut': 34.56, 'Bekasi': -5.63, 'Belm': -0.8, 'Belawan': 4.02, 'Belfast': 55.45, 'Belford Roxo': -23.31, 'Belgaum': 15.27, 'Belgorod': 50.63, 'Belgrade': 44.2, 'Bellary': 15.27, 'Bellevue': 47.42, 'Bello': 5.63, 'Belo Horizonte': -20.09, 'Bene Beraq': 32.95, 'Bengbu': 32.95, 'Benghazi': 32.95, 'Bengkulu': -4.02, 'Benguela': -12.05, 'Benha': 29.74, 'Beni Suef': 29.74, 'Benoni': -26.52, 'Benxi': 40.99, 'Beppu': 32.95, 'Berbera': 10.45, 'Berezniki': 58.66, 'Bergamo': 45.81, 'Bergen': 60.27, 'Bergisch Gladbach': 50.63, 'Berkeley': 37.78, 'Berlin': 52.24, 'Bern': 47.42, 'Bertoua': 4.02, 'Besanon': 47.42, 'Bethal': -26.52, 'Betim': -20.09, 'Bettiah': 26.52, 'Bhadravati': 13.66, 'Bhadreswar': 23.31, 'Bhagalpur': 24.92, 'Bhairab Bazar': 24.92,
      'Bharatpur': 26.52, 'Bharuch': 21.7, 'Bhatpara': 23.31, 'Bhavnagar': 21.7, 'Bhilai': 21.7, 'Bhilwara': 24.92, 'Bhimavaram': 16.87, 'Bhind': 26.52, 'Bhiwandi': 20.09,
      'Bhiwani': 28.13, 'Bhopal': 23.31, 'Bhubaneswar': 20.09, 'Bhuj': 23.31, 'Bhusawal': 21.7, 'Bin Ha': 10.45, 'Bialystok': 53.84, 'Bid': 18.48, 'Bida': 8.84, 'Bidar': 18.48, 'Bielefeld': 52.24, 'Bielsko Biala': 50.63, 'Bihar': 24.92, 'Bijapur': 16.87, 'Bikaner': 28.13, 'Bila Tserkva': 49.03, 'Bilaspur': 21.7, 'Bilbao': 42.59, 'Binangonan': 13.66, 'Binjai': 4.02, 'Bintulu': 2.41, 'Binzhou': 37.78, 'Biratnagar': 26.52, 'Birganj': 26.52, 'Birigui': -21.7, 'Birjand': 32.95, 'Birmingham': 52.24, 'Birnin Kebbi': 12.05, 'Bisho': -32.95, 'Bissau': 12.05, 'Bitung': 0.8, 'Biysk': 52.24, 'Blackburn': 53.84, 'Blackpool': 53.84, 'Blagoveshchensk': 50.63, 'Blantyre': -15.27, 'Blitar': -8.84, 'Bloemfontein': -29.74, 'Blumenau': -26.52, 'Boa Vista': 2.41, 'Bobo Dioulasso': 10.45, 'Bochum': 52.24, 'Bogor': -7.23, 'Bogot': 4.02, 'Bohicon': 7.23, 'Bojnurd': 37.78, 'Bokaro': 23.31, 'Boksburg': -26.52, 'Bologna': 44.2, 'Bolton': 53.84, 'Boma': -5.63, 'Bombay': 18.48, 'Bonn': 50.63, 'Bontang': 0.8, 'Bordeaux': 44.2, 'Borujerd': 34.56, 'Boshan': 36.17, 'Boston': 42.59, 'Botad': 21.7, 'Botosani': 47.42, 'Botshabelo': -29.74, 'Bottrop': 52.24, 'Botucatu': -23.31, 'Bouak': 7.23, 'Boulogne Billancourt': 49.03, 'Bournemouth': 50.63, 'Bozhou': 32.95, 'Bradford': 53.84, 'Braga': 40.99, 'Bragana Paulista': -23.31, 'Brahmapur': 18.48, 'Braila': 45.81, 'Brakpan': -26.52, 'Braslia': -15.27, 'Brasov': 45.81, 'Bratislava': 47.42, 'Bratsk': 55.45, 'Brazzaville': -4.02, 'Brebes': -7.23, 'Breda': 52.24, 'Bremen': 53.84, 'Bremerhaven': 53.84, 'Brescia': 45.81, 'Brest': 52.24, 'Bridgeport': 40.99, 'Brighton': 50.63, 'Brikama': 13.66, 'Brisbane': -28.13, 'Bristol': 52.24, 'Brits': -24.92, 'Brno': 49.03, 'Brownsville': 26.52, 'Brugge': 50.63, 'Brunswick': 52.24, 'Brussels': 50.63, 'Bryansk': 53.84, 'Bucaramanga': 7.23, 'Bucharest': 44.2, 'Budapest': 47.42, 'Budaun': 28.13, 'Buenaventura': 4.02, 'Buffalo': 42.59, 'Buga': 4.02, 'Bugama': 4.02, 'Buhe': 29.74, 'Bujumbura': -4.02, 'Bukan': 36.17, 'Bukavu': -2.41, 'Bukit Mertajam': 5.63, 'Bulandshahr': 28.13, 'Bulaon': 15.27, 'Bulawayo': -20.09, 'Buon Me Thuot': 12.05, 'Buraydah': 26.52, 'Burbank': 34.56, 'Burewala': 29.74, 'Burgas': 42.59, 'Burgos': 42.59, 'Burhanpur': 21.7, 'Bursa': 39.38, 'Bushehr': 29.74, 'Butembo': 0.8, 'Butterworth': 5.63, 'Butuan': 8.84, 'Buzau': 45.81, 'Bydgoszcz': 53.84, 'Bytom': 50.63, 'C Mau': 8.84, 'Crdoba': 18.48, 'Ca': 10.45, 'Ccuta': 7.23, 'Cabanatuan': 15.27, 'Cabimas': 10.45, 'Cabo Frio': -23.31, 'Cabudare': 10.45, 'Cachoeirinha': -29.74, 'Cachoeiro De Itapemirim': -20.09, 'Cadiz': 10.45, 'Caen': 49.03, 'Cagayan De Oro': 8.84, 'Cagliari': 39.38, 'Cagua': 10.45, 'Cainta': 15.27, 'Cairns': -16.87, 'Cairo': 29.74, 'Cajamarca': -7.23, 'Calabar': 5.63, 'Calabozo': 8.84, 'Calama': -23.31, 'Calamba': 13.66, 'Calcutta': 23.31, 'Calgary': 50.63, 'Cali': 4.02, 'Cam Pha': 21.7, 'Cam Ranh': 12.05, 'Camaari': -12.05, 'Camagey': 21.7, 'Camaragibe': -7.23, 'Cambridge': 52.24, 'Campeche': 20.09, 'Campina Grande': -7.23, 'Campinas': -23.31, 'Campo Grande': -20.09, 'Campos': -21.7, 'Can Tho': 10.45, 'Canberra': -36.17, 'Cancn': 21.7, 'Cangzhou': 37.78, 'Canoas': -29.74, 'Cap Hatien': 20.09, 'Cape Coast': 5.63, 'Cape Coral': 26.52, 'Cape Town': -32.95, 'Capiat': -24.92, 'Carpano': 10.45, 'Caracas': 10.45, 'Carapicuba': -23.31, 'Cardiff': 52.24, 'Cariacica': -20.09, 'Carmen': 18.48, 'Carolina': 18.48, 'Carrefour': 18.48, 'Carrollton': 32.95, 'Cartagena': 10.45, 'Cartago': 4.02, 'Caruaru': -8.84, 'Cary': 36.17, 'Casablanca': 32.95, 'Cascavel': -24.92, 'Castanhal': -0.8, 'Catamarca': -28.13, 'Catanduva': -21.7, 'Catania': 37.78, 'Catia La Mar': 10.45, 'Caucaia': -4.02, 'Cavite': 15.27, 'Caxias': -5.63, 'Caxias Do Sul': -29.74, 'Cebu': 10.45, 'Cedar Rapids': 42.59, 'Celaya': 20.09, 'Chakwal': 32.95, 'Chalco': 20.09, 'Champdani': 23.31, 'Chandannagar': 23.31, 'Chandausi': 28.13, 'Chandigarh': 31.35, 'Chandler': 32.95, 'Chandpur': 23.31, 'Chandrapur': 20.09, 'Changchun': 44.2, 'Changde': 28.13, 'Changji': 44.2, 'Changzhou': 31.35, 'Chaohu': 31.35, 'Chaoyang': 40.99, 'Chaozhou': 23.31, 'Chapec': -26.52, 'Charallave': 10.45, 'Charleroi': 50.63, 'Charleston': 32.95, 'Charlotte': 34.56, 'Chas': 23.31, 'Chattanooga': 34.56, 'Chavakachcheri': 8.84, 'Cheboksary': 55.45, 'Chelmsford': 52.24, 'Cheltenham': 52.24, 'Chelyabinsk': 55.45, 'Chemnitz': 50.63, 'Chengde': 40.99, 'Chengdu': 31.35, 'Chenghai': 23.31, 'Chenzhou': 26.52, 'Cherepovets': 58.66, 'Cherkasy': 49.03, 'Cherkessk': 44.2, 'Chernihiv': 52.24, 'Chernivtsi': 49.03, 'Chesapeake': 36.17, 'Chetumal': 18.48, 'Chhapra': 26.52, 'Chhatarpur': 24.92, 'Chhindwara': 21.7, 'Chiang Mai': 18.48, 'Chicago': 42.59, 'Chiclayo': -7.23, 'Chifeng': 42.59, 'Chigasaki': 36.17, 'Chihuahua': 28.13, 'Chikmagalur': 13.66, 'Chillan': -36.17, 'Chilpancingo': 18.48, 'Chimalhuacn': 20.09, 'Chimbote': -8.84, 'Chimoio': -18.48, 'Chinandega': 12.05, 'Chincha Alta': -13.66, 'Chingola': -12.05, 'Chiniot': 31.35, 'Chishtian Mandi': 29.74, 'Chisinau': 47.42, 'Chita': 52.24, 'Chitradurga': 13.66, 'Chittaurgarh': 24.92, 'Chitungwiza': -18.48, 'Chizhou': 31.35, 'Chofu': 36.17, 'Choloma': 15.27, 'Chon Buri': 13.66, 'Chongqing': 29.74, 'Chorzow': 50.63, 'Chosica': -12.05, 'Christchurch': -44.2, 'Chula Vista': 32.95, 'Chuncheng': 21.7, 'Chungho': 24.92, 'Chupei': 24.92, 'Churu': 28.13, 'Chuzhou': 32.95, 'Ciamis': -7.23, 'Ciampea': -7.23, 'Cianjur': -7.23, 'Cibadak': -7.23, 'Cibinong': -5.63, 'Cibitung': -5.63, 'Cicalengka': -7.23, 'Ciego De vila': 21.7, 'Cienfuegos': 21.7, 'Cikampek': -7.23, 'Cikarang': -5.63, 'Cikupa': -5.63, 'Cilegon': -5.63, 'Cileungsi': -5.63, 'Cileunyi': -7.23, 'Cimahi': -7.23, 'Cincinnati': 39.38,
      'Ciomas': -7.23, 'Ciparay': -7.23, 'Ciputat': -5.63, 'Cirebon': -7.23, 'Cisaat': -7.23, 'Cisarua': -5.63, 'Citeureup': -5.63, 'Ciudad Bolvar': 8.84, 'Ciudad Guayana': 8.84, 'Ciudad Valles': 21.7, 'Clarksville': 36.17, 'Clearwater': 28.13, 'Clermont Ferrand': 45.81, 'Cleveland': 40.99, 'Cluj Napoca': 47.42, 'Coacalco': 20.09, 'Coatzacoalcos': 18.48, 'Cochabamba': -16.87, 'Coimbra': 40.99, 'Colatina': -20.09, 'Colchester': 52.24, 'Colima': 20.09, 'Cologne': 50.63, 'Colombo': -24.92, 'Colorado Springs': 39.38, 'Columbia': 34.56, 'Columbus': 32.95, 'Comodoro Rivadavia': -45.81, 'Conakry': 8.84, 'Concepcion': -36.17, 'Concord': 37.78, 'Concordia': -31.35, 'Conselheiro Lafaiete': -20.09, 'Constanta': 44.2, 'Constantine': 36.17, 'Contagem': -20.09, 'Copenhagen': 55.45, 'Copiapo': -28.13, 'Coquimbo': -29.74, 'Coral Springs': 26.52, 'Cordoba': -31.35, 'Cork': 52.24, 'Coro': 12.05, 'Corona': 32.95, 'Coronel Fabriciano': -20.09, 'Corpus Christi': 28.13, 'Corrientes': -28.13, 'Costa Mesa': 32.95, 'Cotabato': 7.23, 'Cotia': -23.31, 'Cotonou': 7.23, 'Cottbus': 52.24, 'Coventry': 52.24, 'Cracow': 50.63, 'Craiova': 44.2, 'Crawley': 50.63, 'Cricima': -28.13, 'Cuautitln Izcalli': 20.09, 'Cuautla': 18.48, 'Cubato': -23.31, 'Cuddapah': 15.27, 'Cuenca': -2.41, 'Cuernavaca': 18.48, 'Cuiab': -15.27, 'Culiacn': 24.92, 'Cuman': 10.45, 'Curico': -34.56, 'Curitiba': -24.92, 'Curug': -5.63, 'Cusco': -13.66, 'Czestochowa': 50.63, 'Dsseldorf': 50.63, 'Da Lat': 12.05, 'Da Nang': 15.27, 'Daan': 29.74, 'Dabrowa Gornicza': 50.63, 'Dadiangas': 5.63, 'Dadu': 26.52, 'Dagupan': 16.87, 'Dahuk': 36.17, 'Daito': 34.56, 'Dakar': 15.27, 'Dali': 26.52, 'Dalian': 39.38, 'Daliang': 23.31, 'Dallas': 32.95, 'Daloa': 7.23, 'Damascus': 32.95, 'Damaturu': 12.05, 'Damoh': 23.31, 'Dandong': 39.38, 'Danshui': 23.31, 'Dar Es Salaam': -7.23, 'Darbhanga': 26.52, 'Darjiling': 26.52, 'Darmstadt': 50.63, 'Daska': 32.95, 'Dasmarias': 13.66, 'Dasoguz': 40.99, 'Datong': 40.99, 'Daugavpils': 55.45, 'Davao': 7.23, 'Dawei': 13.66, 'Dawukou': 39.38, 'Daxian': 31.35, 'Dayton': 39.38, 'Debre Zeyit': 8.84, 'Debrecen': 47.42, 'Dehra Dun': 29.74, 'Dehri': 24.92, 'Dehui': 44.2, 'Dekernes': 31.35, 'Delhi': 28.13, 'Delicias': 28.13, 'Delmas': 18.48, 'Denizli': 37.78, 'Denpasar': -8.84, 'Denton': 32.95, 'Denver': 39.38, 'Deoria': 26.52, 'Depok': -5.63, 'Dera Ghazi Khan': 29.74, 'Dera Ismail Khan': 31.35, 'Derbent': 42.59, 'Derby': 53.84, 'Des Moines': 40.99, 'Dese': 10.45, 'Detroit': 42.59, 'Dewas': 23.31, 'Deyang': 31.35, 'Dezful': 32.95, 'Dezhou': 37.78, 'Dhaka': 23.31, 'Dhanbad': 23.31, 'Dharan': 26.52, 'Dharmavaram': 15.27, 'Dhaulpur': 26.52, 'Dhule': 20.09, 'Diadema': -23.31, 'Dibrugarh': 28.13, 'Didao': 45.81, 'Digos': 7.23, 'Dijon': 47.42, 'Dimapur': 26.52, 'Dimitrovgrad': 53.84, 'Dinajpur': 24.92, 'Dindigul': 10.45, 'Dingzhou': 39.38, 'Diourbel': 15.27, 'Dire Dawa': 10.45, 'Divinpolis': -20.09, 'Divo': 5.63, 'Djougou': 10.45, 'Do Rud': 32.95, 'Dodoma': -5.63, 'Doha': 24.92, 'Donghai': 23.31, 'Dongli': 20.09, 'Dongling': 40.99, 'Dongtai': 32.95, 'Dongying': 37.78, 'Dordrecht': 52.24, 'Dortmund': 52.24, 'Dos Hermanas': 37.78, 'Dos Quebradas': 5.63, 'Douala': 4.02, 'Dourados': -21.7, 'Downey': 34.56, 'Dresden': 50.63, 'Drobeta Turnu Severin': 44.2, 'Dubai': 24.92, 'Dublin': 53.84, 'Dudley': 52.24, 'Duisburg': 50.63, 'Dum Dum': 23.31, 'Duma': 32.95, 'Dumaguete': 8.84, 'Dumai': 2.41, 'Dundee': 57.05, 'Dunedin': -45.81, 'Dunhua': 42.59, 'Duque De Caxias': -23.31, 'Durango': 24.92, 'Durban': -29.74, 'Durg': 21.7, 'Durgapur': 23.31, 'Durham': 36.17, 'Durrs': 40.99, 'Dushanbe': 39.38, 'Dzerzhinsk': 57.05, 'East London': -32.95, 'East Los Angeles': 34.56, 'Eastbourne': 50.63, 'Ebetsu': 42.59, 'Ebina': 36.17, 'Ecatepec': 20.09, 'Eda': 4.02, 'Ede': 52.24, 'Edinburgh': 55.45, 'Edirne': 42.59, 'Edison': 40.99, 'Edmonton': 53.84, 'Eindhoven': 52.24, 'Ejido': 8.84, 'Ejigbo': 7.23, 'Ekibastuz': 52.24, 'El Faiym': 29.74, 'El Limn': 10.45, 'El Mahalla El Kubra': 31.35, 'El Monte': 34.56, 'El Paso': 31.35, 'El Progreso': 15.27, 'El Tigre': 8.84, 'Elbasan': 40.99, 'Elblag': 53.84, 'Eldoret': 0.8, 'Elektrostal': 55.45, 'Elista': 45.81, 'Elizabeth': 40.99, 'Eluru': 16.87, 'Embu': -23.31, 'Emmen': 52.24, 'Encheng': 21.7, 'Engels': 50.63, 'Enschede': 52.24, 'Ensenada': 31.35, 'Enugu': 7.23, 'Envigado': 5.63, 'Erfurt': 50.63, 'Erlangen': 49.03, 'Erode': 12.05, 'Erzincan': 39.38, 'Erzurum': 39.38, 'Escondido': 32.95, 'Escuintla': 15.27, 'Esenyurt': 40.99, 'Esfahan': 32.95, 'Eskisehir': 39.38, 'Eslamshahr': 36.17, 'Esmeraldas': -20.09, 'Espoo': 60.27, 'Essen': 50.63, 'Etah': 28.13, 'Etawah': 26.52, 'Eugene': 44.2, 'Evansville': 37.78, 'Exeter': 50.63, 'Ezhou': 29.74, 'Frth': 49.03, 'Fairfield': 37.78, 'Faisalabad': 31.35, 'Faizabad': 26.52, 'Faridabad': 28.13, 'Faridpur': 23.31, 'Farrukhabad': 28.13, 'Fatehpur': 26.52, 'Fayetteville': 34.56, 'Feira De Santana': -12.05, 'Fengcheng': 40.99, 'Fengshan': 23.31, 'Fernando De La Mora': -24.92, 'Ferrara': 44.2, 'Ferraz De Vasconcelos': -23.31, 'Fez': 34.56, 'Fianarantsoa': -21.7, 'Firozabad': 26.52, 'Firozpur': 31.35, 'Flint': 42.59, 'Florence': 44.2, 'Florencia': 2.41, 'Florianpolis': -28.13, 'Floridablanca': 7.23, 'Focsani': 45.81, 'Foggia': 40.99, 'Fontana': 34.56, 'Forl': 44.2, 'Formosa': -26.52, 'Fort Collins': 40.99, 'Fort Lauderdale': 26.52, 'Fort Wayne': 40.99, 'Fort Worth': 32.95, 'Fortaleza': -4.02, 'Foshan': 23.31, 'Foz Do Iguau': -24.92, 'Franca': -20.09, 'Francisco Morato': -23.31, 'Franco Da Rocha': -23.31, 'Frankfurt': 50.63, 'Freetown': 8.84, 'Freiburg': 47.42, 'Fremont': 37.78, 'Fresnillo': 23.31, 'Fresno': 36.17, 'Fuchu': 36.17, 'Fuenlabrada': 40.99, 'Fuji': 34.56, 'Fujieda': 34.56, 'Fujimi': 36.17, 'Fujinomiya': 34.56, 'Fujisawa': 36.17, 'Fukaya': 36.17, 'Fukuyama': 34.56, 'Fuling': 29.74, 'Fullerton': 32.95, 'Funabashi': 36.17, 'Funtua': 12.05, 'Fushun': 40.99, 'Fuxin': 42.59, 'Fuyang': 32.95, 'Fuyu': 45.81, 'Fuzhou': 26.52, 'Gmez Palacio': 24.92, 'Gteborg': 58.66, 'Gttingen': 52.24, 'Gaborone': -24.92, 'Gadag': 15.27, 'Gagnoa': 5.63, 'Gainesville': 29.74, 'Galati': 45.81, 'Gandajika': -7.23, 'Gandhidham': 23.31, 'Gandhinagar': 23.31, 'Ganganagar': 29.74, 'Gangapur': 26.52, 'Gangawati': 15.27, 'Ganzhou': 26.52, 'Gaomi': 36.17, 'Gaozhou': 21.7, 'Garanhuns': -8.84, 'Garden Grove': 32.95, 'Gardez': 32.95, 'Garland': 32.95,
      'Garoua': 8.84, 'Garut': -7.23, 'Garza Garca': 26.52, 'Gashua': 13.66, 'Gaya': 24.92, 'Gaziantep': 37.78, 'Gazipur': 23.31, 'Gazni': 32.95, 'Gboko': 7.23, 'Gbongan':
      7.23, 'Gdansk': 53.84, 'Gdynia': 53.84, 'Gebze': 40.99, 'Geelong': -37.78, 'Gejiu': 23.31, 'Gelsenkirchen': 52.24, 'Gemena': 4.02, 'General Escobedo': 26.52, 'Geneva': 45.81, 'Genoa': 44.2, 'Gent': 50.63, 'George': -34.56, 'Georgetown': 7.23, 'Gera': 50.63, 'Getafe': 40.99, 'Ghaziabad': 28.13, 'Ghazipur': 24.92, 'Gijn': 44.2, 'Gilbert': 32.95, 'Gillingham': 50.63, 'Girn': 7.23, 'Girardot': 4.02, 'Giugliano In Campania': 40.99, 'Gizeh': 29.74, 'Glasgow': 55.45, 'Glazov': 58.66, 'Glendale': 32.95, 'Gliwice': 50.63, 'Gloucester': 52.24, 'Godhra': 23.31, 'Goinia': -16.87, 'Gojra': 31.35, 'Gold Coast': -28.13, 'Goma': -2.41, 'Gombe': 10.45, 'Gomel': 52.24, 'Gonbad E Qabus': 37.78, 'Gonda': 26.52, 'Gondal': 21.7, 'Gondar': 12.05, 'Gongzhuling': 44.2, 'Gorakhpur': 26.52, 'Gorgan': 36.17, 'Gorontalo': 0.8, 'Gorzow Wielkopolski': 52.24, 'Governador Valadares': -18.48, 'Granada': 37.78, 'Grand Prairie': 32.95, 'Grand Rapids': 42.59, 'Gravata': -29.74, 'Graz': 47.42, 'Green Bay': 44.2, 'Greensboro': 36.17, 'Grenoble': 45.81, 'Grogol': -7.23, 'Groningen': 53.84, 'Guaba': -29.74, 'Guacara': 10.45, 'Guadalajara': 20.09, 'Guadalupe': 26.52, 'Guanare': 8.84, 'Guangshui': 31.35, 'Guangyuan': 32.95, 'Guangzhou': 23.31, 'Guantnamo': 20.09, 'Guarapari': -20.09, 'Guarapuava': -24.92, 'Guaratinguet': -23.31, 'Guarenas': 10.45, 'Guaruj': -23.31, 'Guarulhos': -23.31, 'Guatemala': 15.27, 'Guatemala City': 15.27, 'Guatire': 10.45, 'Guayaquil': -2.41, 'Guaymas': 28.13, 'Gudalur': 12.05, 'Gudivada': 16.87, 'Guelph': 44.2, 'Guilin': 24.92, 'Guiyang': 26.52, 'Gujranwala': 32.95, 'Gujrat': 32.95, 'Gulbarga': 16.87, 'Gulu': 2.41, 'Guna': 24.92, 'Guntakal': 15.27,
        'Guntur': 16.87, 'Gurgaon': 28.13, 'Gusau': 12.05, 'Guwahati': 26.52, 'Gwalior': 26.52, 'Gweru': -20.09, 'Gyor': 47.42, 'Gyumri': 40.99, 'Ha Bnh': 20.09, 'Ha Noi': 21.7, 'Haarlem': 52.24, 'Haarlemmermeer': 52.24, 'Habikino': 34.56, 'Habra': 23.31, 'Hachinohe': 40.99, 'Hachioji': 36.17, 'Hadano': 36.17, 'Hadejia': 12.05, 'Hafizabad': 31.35, 'Hagen': 52.24, 'Hagonoy': 15.27, 'Hai Phong': 21.7, 'Haibowan': 39.38, 'Haicheng': 23.31, 'Haifa': 32.95, 'Haikou': 20.09, 'Hailar': 49.03, 'Hailun': 47.42, 'Haimen': 23.31, 'Hajipur': 24.92, 'Hakodate': 40.99, 'Haldia': 21.7, 'Haldwani': 29.74, 'Halifax': 44.2, 'Halisahar': 23.31, 'Halle': 50.63, 'Hamadan': 34.56, 'Hamamatsu': 34.56, 'Hamburg': 53.84, 'Hami': 42.59, 'Hamilton': 42.59, 'Hamm': 52.24, 'Hampton': 36.17, 'Handa': 34.56, 'Handan': 36.17, 'Hangu': 39.38, 'Hangzhou': 29.74, 'Hanoi': 21.7, 'Hanover': 52.24, 'Hanumangarh': 29.74, 'Hanzhong': 32.95, 'Haora': 23.31, 'Hapur': 28.13, 'Harare': -18.48, 'Harbin': 45.81, 'Hardoi': 26.52, 'Hargeysa': 8.84, 'Haridwar': 29.74, 'Hartford': 40.99, 'Hassan': 13.66, 'Hat Yai': 7.23, 'Hathras': 28.13, 'Hayward': 37.78, 'Hazaribag': 23.31, 'Hebi': 36.17, 'Hefei': 31.35, 'Hegang': 47.42, 'Heidelberg': 49.03, 'Heihe': 50.63, 'Heilbronn': 49.03, 'Helsinki': 60.27, 'Henderson': 36.17, 'Hengshan': 45.81, 'Hengshui': 37.78, 'Hengyang': 26.52, 'Henzada': 16.87, 'Herat': 34.56, 'Hermosillo': 29.74, 'Herne': 52.24, 'Heze': 34.56, 'Hialeah': 26.52, 'Higey': 18.48, 'Highlands Ranch': 39.38, 'Hikone':
      34.56, 'Hildesheim': 52.24, 'Himeji': 34.56, 'Hindupur': 13.66, 'Hino': 36.17, 'Hirakata': 34.56, 'Hiratsuka': 36.17, 'Hirosaki': 40.99, 'Hiroshima': 34.56, 'Hisar':
      29.74, 'Hitachi': 36.17, 'Ho Chi Minh City': 10.45, 'Hobart': -42.59, 'Hofu': 34.56, 'Hohhot': 40.99, 'Holgun': 20.09, 'Hollywood': 26.52, 'Hong Gai': 21.7, 'Honggang': 45.81, 'Honghu': 29.74, 'Horlivka': 49.03, 'Hortolndia': -23.31, 'Hoshangabad': 23.31, 'Hoshiarpur': 31.35, 'Hospet': 15.27, 'Hosur': 12.05, 'Houma': 36.17, 'Houston': 29.74, 'Hrodna': 53.84, 'Hsichih': 24.92, 'Hsinchu': 24.92, 'Hsintien': 24.92, 'Hunuco': -10.45, 'Huadian': 42.59, 'Huaibei': 34.56, 'Huaihua': 28.13, 'Huainan': 32.95, 'Huaiyin': 32.95, 'Huambo': -13.66, 'Huancayo': -12.05, 'Huangcun': 39.38, 'Huangpu': 23.31, 'Huangyan': 28.13, 'Huangzhou': 29.74, 'Hubli': 15.27, 'Huddersfield': 53.84, 'Hue': 16.87, 'Huelva': 37.78, 'Huicheng': 23.31, 'Huixquilucan': 20.09, 'Huizhou': 23.31, 'Hulan': 45.81, 'Hulan Ergi': 47.42, 'Humen': 23.31, 'Huntington Beach': 32.95, 'Huntsville': 34.56, 'Huzhou': 31.35, 'Hyderabad': 16.87, 'Iasi': 47.42, 'Ibadan': 7.23, 'Ibagu': 4.02, 'Ibaraki': 34.56, 'Ibarra': 0.8, 'Ibb': 13.66, 'Ibirit': -20.09, 'Ica': -13.66, 'Ichalkaranji': 16.87, 'Ichihara': 34.56, 'Ichikawa': 36.17, 'Ichinomiya': 34.56, 'Idlib': 36.17, 'Ife': 7.23, 'Igboho': 8.84, 'Iguala': 18.48, 'Iida': 36.17, 'Ijero': 7.23, 'Ikare': 7.23, 'Ikere': 7.23, 'Ikire': 7.23, 'Ikirun': 7.23, 'Ikole': 7.23, 'Ikoma': 34.56, 'Ikorodu': 7.23, 'Ikot Ekpene': 5.63, 'Ila': 7.23, 'Ilam': 32.95, 'Ilawe': 7.23, 'Ilebo': -4.02, 'Ilesha': 8.84, 'Ilhus': -15.27, 'Iligan': 8.84, 'Ilobu': 7.23, 'Iloilo': 10.45, 'Ilorin': 8.84, 'Imabari': 34.56, 'Imperatriz': -5.63, 'Imphal': 24.92, 'Inazawa': 34.56, 'Indaiatuba': -23.31, 'Independence': 39.38, 'Indianapolis': 39.38, 'Indore': 23.31, 'Indramayu': -5.63, 'Inegol': 39.38, 'Inglewood': 34.56, 'Ingolstadt': 49.03, 'Ingraj Bazar': 24.92, 'Inisa': 7.23, 'Innsbruck': 47.42, 'Ipatinga': -20.09, 'Ipoh': 4.02, 'Ipswich': 52.24, 'Iquique': -20.09, 'Iquitos': -4.02, 'Irklion': 34.56, 'Iranshahr': 26.52, 'Irapuato': 20.09, 'Irbid': 32.95, 'Irbil': 36.17, 'Iringa': -7.23, 'Irkutsk': 52.24, 'Iruma': 36.17, 'Irvine': 32.95, 'Irving': 32.95, 'Ise': 7.23, 'Isehara': 36.17, 'Isesaki': 36.17, 'Iseyin': 7.23, 'Ishinomaki': 39.38, 'Isiro': 2.41, 'Iskenderun': 36.17, 'Islamabad': 32.95, 'Ismailia': 31.35, 'Isparta': 37.78, 'Istanbul': 40.99, 'Itabora': -23.31, 'Itabuna': -15.27, 'Itag': 5.63, 'Itagua': -23.31, 'Itaja': -26.52, 'Itami': 34.56, 'Itapecerica Da Serra': -23.31, 'Itapetininga': -23.31, 'Itapevi': -23.31, 'Itaquaquecetuba': -23.31, 'Itarsi': 23.31, 'Itu': -23.31, 'Ivanovo': 57.05, 'Iwaki': 37.78, 'Iwakuni': 34.56, 'Iwatsuki': 36.17, 'Iwo': 7.23, 'Ixtapaluca': 20.09, 'Izhevsk': 57.05, 'Izmir': 37.78, 'Izmit': 40.99, 'Izumi': 34.56,
        'Jan': 37.78, 'Ja': -21.7, 'Jabalpur': 23.31, 'Jaboato': -8.84, 'Jacare': -23.31, 'Jackson': 32.95, 'Jacksonville': 29.74, 'Jacobabad': 28.13, 'Jaffna': 8.84, 'Jagadhri': 29.74, 'Jahrom': 28.13, 'Jaipur': 26.52, 'Jakarta': -5.63, 'Jalalabad': 34.56, 'Jalandhar': 31.35, 'Jalingo': 8.84, 'Jalna': 20.09, 'Jalpaiguri': 26.52, 'Jamalpur': 24.92, 'Jamame': 0.8, 'Jambi': -0.8, 'Jammu': 32.95, 'Jamnagar': 21.7, 'Jamshedpur': 23.31, 'Jamuria': 23.31, 'Jandira': -23.31, 'Jaragu Do Sul': -26.52, 'Jaramana': 32.95, 'Jaranwala': 31.35, 'Jaunpur': 26.52, 'Jember': -8.84, 'Jequi': -13.66, 'Jerez': 36.17, 'Jersey City': 40.99, 'Jerusalem': 31.35, 'Jetpur': 21.7, 'Jhang':
      31.35, 'Jhansi': 24.92, 'Jhelum': 32.95, 'Jhunjhunun': 28.13, 'Ji Paran': -10.45, 'Jiamusi': 47.42, 'Jian': 26.52, 'Jiangmen': 23.31, 'Jiangyin': 31.35, 'Jiangyou': 31.35, 'Jiaohe': 44.2, 'Jiaojiang': 28.13, 'Jiaozhou': 36.17, 'Jiaozuo': 34.56, 'Jiaxing': 31.35, 'Jiayuguan': 39.38, 'Jiazi': 23.31, 'Jibuti': 12.05, 'Jiddah': 21.7,
        'Jieshi': 23.31, 'Jieshou': 32.95, 'Jilin': 44.2, 'Jimeta': 8.84, 'Jimma': 7.23, 'Jinan': 36.17, 'Jinchang': 37.78, 'Jinchengjiang': 24.92, 'Jind': 29.74, 'Jingdezhen': 29.74, 'Jinhua': 29.74, 'Jining': 34.56, 'Jinxi': 40.99, 'Jinzhou': 40.99, 'Jiroft': 28.13, 'Jishou': 28.13, 'Jishu': 44.2, 'Jiujiang': 29.74, 'Jiupu': 40.99, 'Jiutai': 44.2, 'Jiutepec': 18.48, 'Jixi': 45.81, 'Joo Pessoa': -7.23, 'Jodhpur': 26.52, 'Joetsu': 37.78, 'Johannesburg': -26.52, 'Johor Bahru': 0.8, 'Joinville': -26.52, 'Joliet': 40.99, 'Jolo': 5.63, 'Jombang': -7.23, 'Jos': 10.45, 'Juzeiro': -8.84, 'Juarez': 31.35, 'Juazeiro Do Norte': -7.23, 'Juba': 4.02, 'Juiz De Fora': -21.7, 'Jujuy': -24.92, 'Juliaca': -15.27, 'Junagadh': 21.7, 'Jundia': -23.31, 'Ktahya': 39.38, 'Kabankalan': 10.45, 'Kabul': 34.56, 'Kabwe': -13.66, 'Kadoma': 34.56, 'Kaduna': 10.45, 'Kahramanmaras': 37.78, 'Kaifeng': 34.56, 'Kaili': 26.52, 'Kaithal': 29.74, 'Kaiyuan': 23.31, 'Kakamigahara': 36.17, 'Kakinada': 16.87, 'Kakogawa': 34.56, 'Kalemie': -5.63, 'Kaliningrad': 55.45, 'Kalisz': 52.24, 'Kallitha': 37.78, 'Kalmunai': 7.23, 'Kalol': 23.31, 'Kaluga': 53.84, 'Kalyan': 20.09, 'Kamagaya': 36.17, 'Kamakura': 34.56, 'Kamalia': 31.35, 'Kamarhati': 23.31, 'Kamensk Uralskiy': 55.45, 'Kamoke': 31.35, 'Kampala': 0.8, 'Kamyshin': 50.63, 'Kananga': -5.63, 'Kanchipuram': 13.66, 'Kanchrapara': 23.31, 'Kandi': 10.45, 'Kandy': 7.23, 'Kankan': 10.45, 'Kano': 12.05, 'Kanpur': 26.52, 'Kansas City': 39.38, 'Kansk': 55.45, 'Kaohsiung': 23.31, 'Kaolack': 13.66, 'Kapra': 16.87, 'Karachi': 24.92, 'Karaj': 36.17, 'Karaman': 37.78, 'Karamay': 45.81, 'Karang Tengah': -7.23, 'Karawang': -5.63, 'Karimnagar': 18.48, 'Kariya': 34.56, 'Karlsruhe': 49.03, 'Karnal': 29.74, 'Kashan': 34.56, 'Kashi': 39.38, 'Kashihara': 34.56, 'Kashipur': 29.74, 'Kashiwa': 36.17, 'Kassala': 15.27, 'Kassel': 50.63, 'Kasuga': 32.95, 'Kasugai': 34.56, 'Kasukabe': 36.17, 'Kasur': 31.35, 'Kathmandu': 28.13, 'Katihar': 24.92, 'Katowice': 50.63, 'Katsina': 13.66, 'Katumba': -8.84, 'Kaunas': 55.45, 'Kawagoe': 36.17, 'Kawaguchi': 36.17, 'Kawanishi': 34.56, 'Kawasaki': 36.17, 'Kayseri': 39.38, 'Kazan': 55.45, 'Kebumen': -7.23, 'Kecskemt': 47.42, 'Kediri': -7.23, 'Kedungwuni': -7.23, 'Keelung': 24.92, 'Kelowna': 49.03, 'Kemang': -7.23, 'Kemerovo': 55.45, 'Kendari': -4.02, 'Kenitra': 34.56, 'Kerch': 45.81, 'Kerman': 29.74, 'Kermanshah': 34.56, 'Khabarovsk': 49.03, 'Khairpur': 28.13, 'Khammam': 16.87, 'Khandwa': 21.7, 'Khanewal': 29.74, 'Khanna': 31.35, 'Khanpur':
      28.13, 'Kharagpur': 21.7, 'Khardaha': 23.31, 'Khartoum': 15.27, 'Kherson': 47.42, 'Khimki': 55.45, 'Khlong Luang': 13.66, 'Khomeynishahr': 32.95, 'Khon Kaen': 16.87,
        'Khorramabad': 32.95, 'Khorramshahr': 29.74, 'Khoy': 37.78, 'Khujand': 40.99, 'Khulna': 23.31, 'Khurja': 28.13, 'Khushab': 32.95, 'Khuzdar': 28.13, 'Kiel': 53.84, 'Kielce': 50.63, 'Kiev': 50.63, 'Kigali': -2.41, 'Kigoma': -4.02, 'Kikwit': -5.63, 'Killeen': 31.35, 'Kimberley': -28.13, 'Kindia': 10.45, 'Kindu': -2.41, 'Kingston': 44.2, 'Kingston Upon Hull': 53.84, 'Kinshasa': -4.02, 'Kirkuk': 36.17, 'Kirov': 58.66, 'Kirovohrad': 49.03, 'Kiryu': 36.17, 'Kisangani': 0.8, 'Kisaran': 2.41, 'Kisarazu': 34.56, 'Kishi': 8.84, 'Kishiwada': 34.56, 'Kislovodsk': 44.2, 'Kismayo': -0.8, 'Kisumu': -0.8, 'Kitakyushu': 34.56, 'Kitami': 44.2, 'Kitchener': 44.2, 'Kitwe': -12.05, 'Klaipeda': 55.45, 'Klang': 2.41, 'Klaten': -7.23, 'Klerksdorp': -26.52, 'Kluang': 2.41, 'Knoxville': 36.17, 'Kobe': 34.56, 'Koblenz': 50.63, 'Kochi': 10.45, 'Kodaira': 36.17, 'Koganei': 36.17, 'Kohat': 32.95, 'Koidu': 8.84, 'Kokubunji': 36.17, 'Kolar': 13.66, 'Kolhapur': 16.87, 'Kollam': 8.84, 'Kolomna': 55.45, 'Kolpino': 60.27, 'Komaki': 34.56, 'Komatsu': 36.17, 'Komsomolsk Na Amure': 50.63, 'Konan': 36.17, 'Konya': 37.78, 'Korba': 21.7, 'Korhogo': 8.84, 'Koriyama': 37.78, 'Korla': 40.99, 'Koronadal': 5.63, 'Koshigaya': 36.17, 'Kosice': 49.03, 'Kostroma': 57.05, 'Koszalin': 53.84, 'Kot Addu': 29.74, 'Kota': 24.92, 'Kota Bahru': 5.63, 'Kota Kinabalu': 5.63, 'Kotte': 7.23, 'Koussri': 12.05, 'Kovrov': 57.05, 'Kpalim': 7.23, 'Kragujevac': 44.2, 'Krasnodar': 45.81, 'Krasnoyarsk': 55.45, 'Krefeld': 50.63, 'Kremenchuk': 49.03, 'Kresek': -5.63, 'Krishnanagar': 23.31, 'Kroonstad': -28.13, 'Krugersdorp': -26.52, 'Kryvyy Rih': 47.42, 'Kuala Lumpur': 2.41, 'Kuala Terengganu': 5.63, 'Kuantan': 4.02, 'Kuching': 0.8, 'Kuhdasht': 32.95, 'Kuito': -12.05, 'Kulim': 5.63, 'Kulti': 23.31, 'Kumagaya': 36.17, 'Kumanovo': 42.59, 'Kumasi': 7.23, 'Kumba': 4.02, 'Kumbakonam': 10.45, 'Kunming': 24.92, 'Kupang': -10.45, 'Kurashiki': 34.56, 'Kure': 34.56, 'Kurgan': 55.45, 'Kursk': 52.24, 'Kurume': 32.95, 'Kusatsu': 34.56, 'Kusti': 13.66, 'Kuwana': 34.56, 'Kuytun': 44.2, 'Kwekwe': -18.48, 'Kyzyl': 52.24, 'Lrisa': 39.38, 'Lpez Mateos': 20.09, 'Lbeck': 53.84, 'La Ceiba': 15.27, 'La Paz': -16.87, 'La Plata': -34.56, 'La Rioja': -29.74, 'La Romana': 18.48, 'La Serena': -29.74, 'La Vega': 18.48, 'Lafayette': 29.74, 'Lafia': 8.84, 'Lafiagi': 8.84, 'Lages': -28.13, 'Lagos': 5.63, 'Lahad Datu': 5.63, 'Lahore': 31.35, 'Laiwu': 36.17, 'Laiyang': 36.17, 'Lakewood': 39.38, 'Lakhimpur': 28.13, 'Lakhnau': 26.52, 'Lalitpur': 24.92, 'Lambar': -24.92, 'Lampang': 18.48, 'Lancaster': 34.56, 'Langfang': 39.38, 'Lansing': 42.59, 'Lanzhou': 36.17, 'Laoag': 18.48, 'Laohekou': 32.95, 'Lapu Lapu': 10.45, 'Laredo': 28.13, 'Larkana': 28.13, 'Las Palmas': 28.13, 'Las Tunas': 21.7, 'Las Vegas': 36.17, 'Lasa': 29.74, 'Lashio': 23.31, 'Latina': 40.99, 'Latur': 18.48, 'Lausanne': 45.81, 'Lawang': -7.23, 'Len': 21.7, 'Le Havre': 49.03, 'Le Mans': 47.42, 'Leeds': 53.84, 'Legans': 40.99, 'Legaspi': 13.66, 'Leghorn': 44.2, 'Legnica': 50.63, 'Leicester': 52.24, 'Leiden': 52.24, 'Leipzig': 50.63, 'Leiyang': 26.52, 'Lembang': -7.23, 'Lemesos': 34.56, 'Lengshuijiang': 28.13, 'Leninsk Kuznetskiy': 53.84, 'Leshan': 29.74, 'Leuwiliang': -7.23, 'Leverkusen': 50.63, 'Lexington Fayette': 37.78, 'Lige': 50.63, 'Liancheng': 21.7, 'Lianran': 24.92, 'Liaocheng': 36.17, 'Liaoyang':
      40.99, 'Libreville': 0.8, 'Licheng': 23.31, 'Lichinga': -13.66, 'Likasi': -10.45, 'Lille': 50.63, 'Lilongwe': -13.66, 'Lima': -12.05, 'Limeira': -21.7, 'Limoges': 45.81, 'Linchuan': 28.13, 'Lincoln': 40.99, 'Linfen': 36.17, 'Linhai': 28.13, 'Linhares': -20.09, 'Linqing': 36.17, 'Linshui': 36.17, 'Linxi': 39.38, 'Linxia': 36.17, 'Linz': 49.03, 'Lipa': 13.66, 'Lipetsk': 52.24, 'Lira': 2.41, 'Lisbon': 39.38, 'Little Rock': 34.56, 'Liusha': 23.31, 'Liuzhou': 24.92, 'Liverpool': 53.84, 'Livingstone': -18.48, 'Ljubljana': 45.81, 'Lleida': 40.99, 'Loa Janan': -0.8, 'Lobito': -12.05, 'Logroo': 42.59, 'Loja': -4.02, 'London': 42.59, 'Londrina': -23.31, 'Long Beach': 32.95, 'Long Xuyn': 10.45, 'Longfeng': 45.81, 'Longjiang': 47.42, 'Longjing': 42.59, 'Longyan': 24.92, 'Loni': 28.13, 'Los Angeles': -37.78, 'Los Mochis': 26.52, 'Los Reyes': 20.09, 'Los Teques': 10.45, 'Loudi': 28.13, 'Louga': 15.27, 'Louisville': 37.78, 'Loum': 5.63, 'Lowell': 42.59, 'Lower Hutt': -40.99, 'Luan': 31.35, 'Luancheng': 37.78, 'Luanda': -8.84, 'Luanshya': -13.66, 'Lubango': -15.27, 'Lubbock': 32.95, 'Lublin': 50.63, 'Lubumbashi': -12.05, 'Lucena': 13.66, 'Luchou': 24.92, 'Ludhiana': 31.35, 'Ludwigshafen': 49.03, 'Lumajang': -8.84, 'Luohe': 32.95, 'Luoyang': 23.31, 'Luqiao': 28.13, 'Luque': -24.92, 'Lusaka': -15.27, 'Luton': 52.24, 'Luxor': 26.52, 'Luzhou': 29.74, 'Luzinia': -16.87, 'Lvov': 50.63, 'Lyon': 45.81, 'Lyubertsy': 55.45, 'Mlaga': 36.17, 'Mda': 36.17, 'Mrida': 21.7, 'Mstoles': 40.99, 'Mnchengladbach': 50.63, 'Mlheim': 50.63, 'Mnster': 52.24, 'Maanshan': 31.35, 'Maastricht': 50.63, 'Maba': 24.92, 'Mabalacat': 15.27, 'Maca': -21.7, 'Macap': 0.8, 'Macei': -10.45, 'Machala': -4.02, 'Macheng': 31.35, 'Machida': 36.17, 'Machilipatnam': 15.27, 'Madanapalle': 13.66, 'Madhyamgram': 23.31, 'Madison': 42.59, 'Madiun': -7.23, 'Madras': 13.66, 'Madrid': 40.99, 'Madurai': 10.45, 'Mag': -23.31, 'Magangu': 8.84, 'Magdeburg': 52.24, 'Magelang': -7.23, 'Magnitogorsk': 53.84, 'Mahabad': 36.17, 'Mahajanga': -15.27, 'Mahbubnagar': 16.87, 'Mahesana': 23.31, 'Maicao': 12.05, 'Maiduguri': 12.05, 'Mainz': 50.63, 'Maisuru': 12.05, 'Majalaya': -7.23, 'Makasar': -5.63, 'Makati': 15.27, 'Makhachkala': 42.59, 'Makiyivka': 47.42, 'Makurdi': 7.23, 'Malabo': 4.02, 'Malakal': 8.84, 'Malambo': 10.45, 'Malang': -7.23, 'Malatya': 37.78, 'Malegaon': 20.09, 'Maler Kotla': 29.74, 'Malm': 55.45, 'Malolos': 15.27, 'Man': 7.23, 'Manado': 0.8, 'Managua': 12.05, 'Manama': 26.52, 'Manaus': -2.41, 'Manbij': 36.17, 'Manchester': 53.84, 'Mandalay': 21.7, 'Mandaue': 10.45, 'Mandi Bahauddin': 32.95, 'Mandsaur': 24.92, 'Mandya': 12.05, 'Mangaluru': 13.66, 'Manila': 15.27, 'Manisa': 39.38, 'Manizales': 5.63, 'Mannheim': 49.03, 'Manta': -0.8, 'Manzanillo': 20.09, 'Manzini': -26.52, 'Maoming': 21.7, 'Maputo': -26.52, 'Marlia': -21.7, 'Mar Del Plata': -37.78, 'Marab': -5.63, 'Maracaibo': 10.45, 'Maracana': -4.02, 'Maracay': 10.45, 'Maradi': 13.66, 'Maragheh': 37.78, 'Marand': 39.38, 'Marawi': 7.23, 'Marbella': 36.17, 'Mardan': 34.56, 'Mariara': 10.45, 'Maring': -23.31, 'Marivan': 36.17, 'Maroua': 10.45, 'Marrakesh': 31.35, 'Marseille': 42.59, 'Martapura': -4.02, 'Marv Dasht': 29.74, 'Masaya': 12.05, 'Maseru': -29.74, 'Mashhad': 36.17, 'Masjed E Soleyman': 31.35, 'Matadi': -5.63, 'Matamoros': 26.52, 'Matanzas': 23.31, 'Matar': 40.99, 'Mataram': -8.84, 'Mathura': 28.13, 'Matola': -26.52, 'Matsubara': 34.56, 'Matsudo': 36.17, 'Matsumoto': 36.17, 'Matsusaka': 34.56, 'Maturn': 10.45, 'Mau': 26.52, 'Mau': -23.31, 'Mawlamyine': 16.87, 'Maxixe': -23.31, 'Maykop': 44.2, 'Maymyo': 21.7, 'Mazatln': 23.31, 'Mazyr': 52.24, 'Mbandaka': 0.8, 'Mbeya': -8.84, 'Mbouda': 5.63, 'Mbour': 13.66, 'Mbuji Mayi': -5.63, 'Mecca': 21.7, 'Medan': 4.02, 'Medelln': 5.63, 'Meiktila': 20.09, 'Meilu': 21.7, 'Mejicanos': 13.66, 'Melaka': 2.41, 'Melbourne': -37.78, 'Memphis': 34.56, 'Mendoza': -32.95, 'Mentougou': 39.38, 'Mercedes': -32.95, 'Mergui': 12.05, 'Mersin': 36.17, 'Mesa': 32.95, 'Mesquite': 32.95, 'Messina': 37.78, 'Metairie': 29.74, 'Metepec': 18.48, 'Metro': -5.63, 'Metz': 49.03, 'Mexicali': 32.95, 'Mexico': 20.09, 'Meycauayan': 15.27, 'Mezhdurechensk': 53.84, 'Miami': 26.52, 'Miandoab': 36.17, 'Mianyang': 31.35, 'Miass': 55.45, 'Middelburg': -26.52, 'Middlesbrough': 53.84, 'Midrand': -26.52, 'Milagro': -2.41, 'Milan': 45.81, 'Milwaukee': 42.59, 'Minatitln': 18.48, 'Mingaora': 34.56, 'Mingshui': 36.17, 'Minna': 8.84, 'Minneapolis': 45.81, 'Minsk': 53.84, 'Miramar': 26.52, 'Miri': 4.02, 'Mirpur Khas':
      24.92, 'Mirzapur': 24.92, 'Misato': 36.17, 'Mishima': 34.56, 'Miskolc': 47.42, 'Misratah': 32.95, 'Mitaka': 36.17, 'Mixco': 15.27, 'Miyakonojo': 31.35, 'Mobile': 31.35, 'Modakeke': 7.23, 'Modena': 44.2, 'Modesto': 37.78, 'Moers': 50.63, 'Moga': 31.35, 'Mogadishu': 2.41, 'Moji Das Cruzes': -23.31, 'Mojokerto': -7.23, 'Mokolo': 10.45, 'Mombasa': -4.02, 'Monclova': 26.52, 'Monrovia': 7.23, 'Montalban': 15.27, 'Montera': 8.84, 'Monterrey': 26.52, 'Montes Claros': -16.87, 'Montevideo': -34.56, 'Montgomery': 32.95, 'Montpellier': 44.2, 'Montreal': 45.81, 'Monywa': 21.7, 'Monza': 45.81, 'Mopti': 15.27, 'Moradabad': 28.13, 'Moratuwa': 7.23, 'Morelia': 20.09, 'Morena': 26.52, 'Moreno Valley': 34.56, 'Moriguchi': 34.56, 'Mormugao': 15.27, 'Morogoro': -7.23, 'Morvi': 23.31, 'Moscow': 55.45, 'Moshi': -4.02, 'Mossor': -5.63, 'Mostar': 42.59, 'Motihari': 26.52, 'Moundou': 8.84, 'Mubi': 10.45, 'Mudanjiang': 44.2, 'Mufulira': -12.05, 'Mulhouse': 47.42, 'Multan': 29.74, 'Munger': 24.92, 'Munich': 47.42, 'Murcia': 37.78, 'Muridke': 31.35, 'Murmansk': 68.31, 'Murom': 55.45, 'Murwara': 23.31, 'Musashino': 36.17, 'Musoma': -0.8, 'Mutare': -18.48, 'Muzaffargarh': 29.74, 'Muzaffarnagar': 29.74, 'Muzaffarpur': 26.52, 'Mwanza': -2.41, 'Mwene Ditu': -7.23, 'My Tho': 10.45, 'Myingyan': 21.7, 'Mytishchi': 55.45, 'Nmes': 44.2, 'Nacala': -15.27, 'Nadiad': 23.31, 'Nador': 34.56, 'Naga': 13.66, 'Nagaoka': 37.78, 'Nagareyama': 36.17, 'Nagda': 23.31, 'Nagercoil': 8.84, 'Nagoya': 34.56, 'Nagpur': 21.7, 'Naihati': 23.31, 'Nairobi': -0.8, 'Najran': 16.87, 'Nakhodka': 42.59, 'Nakhon Pathom': 13.66, 'Nakhon Ratchasima': 15.27, 'Nakhon Si Thammarat': 8.84, 'Nakuru': -0.8, 'Nalchik': 42.59, 'Nalgonda': 16.87, 'Nam Dinh': 20.09, 'Namangan': 40.99, 'Nampula': -15.27, 'Namur': 50.63, 'Nancha': 47.42, 'Nanchang': 28.13, 'Nanchong': 31.35,
        'Nancy': 49.03, 'Nanded': 18.48, 'Nandurbar': 21.7, 'Nandyal': 15.27, 'Nangloi Jat': 28.13, 'Nanjing': 31.35, 'Nanning': 23.31, 'Nanpiao': 40.99, 'Nantes': 47.42, 'Nantong': 31.35, 'Nantou': 23.31, 'Nanyang': 32.95, 'Naperville': 40.99, 'Naples': 40.99, 'Narashino': 36.17, 'Narayanganj': 23.31, 'Narita': 36.17, 'Narsingdi': 23.31, 'Nashville': 36.17, 'Nassau': 24.92, 'Natal': -5.63, 'Naucalpan': 20.09, 'Navadwip': 23.31, 'Navoi': 39.38, 'Navsari': 20.09, 'Nawabganj': 24.92, 'Nawabshah': 26.52, 'Nazilli': 37.78, 'Nazran': 44.2, 'Nazret': 8.84, 'Ndola': -13.66, 'Neftekamsk': 55.45, 'Nefteyugansk': 61.88, 'Negombo': 7.23, 'Nehe': 49.03, 'Neijiang': 29.74, 'Neiva': 2.41, 'Nelspruit': -24.92, 'Netanya': 32.95, 'Neuquen': -39.38, 'Neuss': 50.63, 'Nevinnomyssk': 44.2, 'New Delhi': 28.13, 'New Haven': 40.99, 'New Orleans': 29.74, 'New York': 40.99, 'Newark': 40.99, 'Newcastle': -32.95, 'Newcastle Upon Tyne': 55.45, 'Newport': 52.24, 'Newport News': 37.78, 'Neyagawa': 34.56, 'Neyshabur': 36.17, 'Neyveli': 12.05, 'Nezahualcyotl': 20.09, 'Ngaoundr': 7.23, 'Nguru': 13.66, 'Nha Trang': 12.05, 'Niamey': 13.66, 'Nice': 44.2, 'Nicols Romero': 20.09, 'Nigel': -26.52, 'Niigata': 37.78, 'Niihama': 34.56, 'Niiza': 36.17, 'Nijmegen': 52.24, 'Nilpolis': -23.31, 'Ningbo': 29.74, 'Nis': 42.59, 'Nishinomiya': 34.56, 'Nishio': 34.56, 'Niteri': -23.31, 'Nizamabad': 18.48, 'Nizhnekamsk': 55.45, 'Nizhnevartovsk': 60.27, 'Nizhniy Novgorod': 57.05, 'Nizhniy Tagil': 57.05, 'Nkongsamba': 5.63, 'Nkpor': 5.63, 'Nnewi': 5.63, 'Nobeoka': 32.95, 'Noda': 36.17, 'Nogales': 31.35, 'Noginsk': 55.45, 'Nonthaburi': 13.66, 'Norfolk': 36.17, 'Norilsk': 69.92, 'Norman': 34.56, 'North Las Vegas': 36.17, 'North Shore': -36.17, 'Northampton': 52.24, 'Norwalk': 34.56, 'Norwich': 52.24, 'Nossa Senhora Do Socorro': -10.45, 'Nottingham': 53.84, 'Nouakchott': 18.48, 'Nova Friburgo': -21.7, 'Nova Iguau': -23.31, 'Novara': 45.81, 'Novi Sad': 45.81, 'Novo Hamburgo': -29.74, 'Novocheboksarsk': 55.45, 'Novocherkassk': 47.42, 'Novokuznetsk': 53.84, 'Novomoskovsk': 53.84, 'Novorossiysk': 44.2, 'Novosibirsk': 55.45, 'Novotroitsk': 50.63, 'Nsukka': 7.23, 'Nueva San Salvador': 13.66,
          'Nuevo Laredo': 28.13, 'Nukus': 42.59, 'Numazu': 34.56, 'Nuremberg': 49.03, 'Nyregyhza': 47.42, 'Nzrkor': 7.23, 'Oakland': 37.78, 'Oaxaca': 16.87, 'Oberhausen': 50.63, 'Obihiro': 42.59, 'Obninsk': 55.45, 'Obosi': 5.63, 'Obregon': 28.13, 'Obuasi': 5.63, 'Oceanside': 32.95, 'Ocumare Del Tuy': 10.45, 'Odawara': 36.17, 'Odense': 55.45, 'Odesa': 45.81, 'Odintsovo': 55.45, 'Offa': 8.84, 'Offenbach': 50.63, 'Ogaki': 34.56, 'Ogbomosho': 8.84, 'Okara': 31.35, 'Okazaki': 34.56, 'Oklahoma City': 36.17, 'Okrika': 4.02, 'Oktyabrskiy': 53.84, 'Olathe': 39.38, 'Oldenburg': 52.24, 'Oldham': 53.84, 'Olinda': -7.23, 'Olomouc': 49.03, 'Olongapo': 15.27, 'Olsztyn': 53.84, 'Omaha': 40.99, 'Ome': 36.17, 'Omsk': 55.45, 'Omuta': 32.95, 'Ondo': 7.23, 'Ongole': 15.27, 'Onitsha': 5.63, 'Ontario': 34.56, 'Opobo': 4.02, 'Opole': 50.63, 'Orl': 52.24, 'Oradea': 47.42, 'Orai': 26.52, 'Orange': 32.95, 'Ordu': 40.99, 'Orekhovo Zuevo': 55.45, 'Orizaba': 18.48, 'Orkney': -26.52, 'Orlans': 47.42, 'Orlando': 28.13, 'Oron': 5.63, 'Orsha': 53.84, 'Orsk': 50.63, 'Orumiyeh': 37.78, 'Oruro': -18.48, 'Osasco': -23.31, 'Oshawa': 44.2, 'Oshogbo': 7.23, 'Oslo': 60.27, 'Osmaniye': 37.78, 'Osnabrck': 52.24, 'Osorno': -40.99, 'Ostrava': 50.63, 'Ota': 36.17, 'Otaru': 42.59, 'Ottawa': 45.81, 'Otukpo': 7.23, 'Ouagadougou': 12.05, 'Oulu': 65.09, 'Overland Park': 39.38, 'Oviedo': 42.59, 'Owerri': 5.63, 'Owo': 7.23, 'Oxford': 52.24, 'Oxnard': 34.56, 'Oyama': 36.17, 'Oyo': 7.23, 'Ptrai': 37.78, 'Pcs': 45.81, 'Ptionville': 18.48, 'Prto Seguro': -16.87, 'Prto Velho': -8.84, 'Paarl': -34.56, 'Pabna': 23.31, 'Pacet': -7.23, 'Pachuca': 20.09, 'Padalarang': -7.23, 'Padang': -0.8, 'Paderborn': 52.24, 'Padova': 45.81, 'Pagadian': 7.23, 'Pak Kret': 13.66, 'Pakokku': 21.7, 'Pakpattan': 29.74, 'Palakkad': 10.45, 'Palanpur': 24.92, 'Palembang': -2.41, 'Palermo':
      37.78, 'Palhoa': -28.13, 'Pali': 26.52, 'Pallavaram': 13.66, 'Palma': 39.38, 'Palma Soriano': 20.09, 'Palmas': -10.45, 'Palmdale': 34.56, 'Palmira': 4.02, 'Palo Negro': 10.45, 'Palu': -0.8, 'Palwal': 28.13, 'Pamanukan': -5.63, 'Pamplona': 42.59, 'Pamulang': -5.63, 'Panam': 8.84, 'Panchiao': 24.92, 'Panevezys': 55.45, 'Pangkah': -7.23, 'Panihati': 23.31, 'Panipat': 29.74, 'Panvel': 18.48, 'Panzhihua': 26.52, 'Paradise': 36.17, 'Parakou': 8.84, 'Paramaribo': 5.63, 'Parana': -31.35, 'Paranagu': -24.92, 'Parbhani': 20.09, 'Paris': 49.03, 'Parma': 44.2, 'Parnaba': -2.41, 'Parnamirim': -5.63, 'Parsabad': 39.38, 'Parung': -5.63, 'Pasadena': 29.74, 'Pasarkemis': -5.63, 'Paseh': -7.23, 'Pasir Gudang': 0.8, 'Passo Fundo': -28.13, 'Pasto': 0.8, 'Pasuruan': -7.23, 'Patan': 23.31, 'Pate': 24.92, 'Paterson': 40.99, 'Pathankot': 32.95, 'Pathein': 16.87, 'Pati': -7.23, 'Patiala': 29.74, 'Patna': 24.92, 'Patos De Minas': -18.48, 'Paulista': -7.23, 'Pavlodar': 52.24, 'Pavlohrad': 49.03, 'Payakumbuh': -0.8, 'Pekalongan': -7.23, 'Peking': 39.38, 'Pelotas': -31.35, 'Pemalang': -7.23, 'Pemba': -13.66, 'Pembroke Pines': 26.52, 'Penza': 53.84, 'Peoria': 32.95, 'Perbaungan': 4.02, 'Pereira': 5.63, 'Peristrion': 37.78, 'Perm': 58.66, 'Perpignan': 42.59, 'Perth': -31.35, 'Perugia': 42.59, 'Pervouralsk': 57.05, 'Pescara': 42.59, 'Peshawar': 34.56, 'Petaling Jaya': 2.41, 'Petapa': 15.27, 'Petare': 10.45, 'Peterborough': 52.24, 'Petrpolis': -23.31, 'Petrolina': -8.84, 'Petropavl': 55.45, 'Petropavlovsk Kamchatskiy': 53.84, 'Petrozavodsk': 61.88, 'Pforzheim': 49.03, 'Phagwara': 31.35, 'Phalaborwa': -23.31, 'Phan Thiet': 10.45, 'Philadelphia': 39.38, 'Phitsanulok': 16.87, 'Phnum Pnh': 12.05, 'Phoenix': 32.95, 'Phra Pradaeng': 13.66, 'Piatra Neamt': 47.42, 'Piedras Negras': 28.13, 'Pietermaritzburg': -29.74, 'Pietersburg': -23.31, 'Pilibhit': 28.13, 'Pimpri': 18.48, 'Pinar Del Ro': 21.7, 'Pindamonhangaba': -23.31, 'Pindiga': 10.45, 'Pingchen': 24.92, 'Pingdingshan': 34.56, 'Pingliang': 36.17, 'Pingshan': 23.31, 'Pingtung': 23.31, 'Pingxiang': 28.13, 'Pinsk': 52.24, 'Piracicaba': -23.31, 'Pitesti': 44.2, 'Pittsburgh': 40.99, 'Piura': -5.63, 'Ply Cu': 13.66, 'Plano': 32.95, 'Pleven': 44.2, 'Plock': 52.24, 'Ploiesti': 45.81, 'Plovdiv': 42.59, 'Plumbon': -7.23, 'Plymouth': 50.63, 'Plzen': 50.63, 'Po': -23.31, 'Poos De Caldas': -21.7, 'Podgorica': 42.59, 'Podolsk': 55.45, 'Pokhara': 28.13, 'Poltava': 49.03, 'Pomona': 34.56, 'Ponce': 18.48, 'Pondicherry': 12.05, 'Ponnani': 10.45, 'Ponta Grossa': -24.92, 'Pontianak': -0.8, 'Poole': 50.63, 'Porbandar': 21.7, 'Port Au Prince': 18.48, 'Port Blair': 12.05, 'Port Elizabeth': -34.56, 'Port Gentil': -0.8, 'Port Harcourt': 4.02, 'Port Louis': -20.09, 'Port Moresby': -8.84, 'Port Said': 31.35, 'Port Saint Lucie': 26.52, 'Portland': 45.81, 'Portmore': 18.48, 'Porto': 40.99, 'Porto Alegre': -29.74, 'Portoviejo': -0.8, 'Portsmouth': 50.63, 'Posadas': -28.13, 'Potchefstroom': -26.52, 'Potgietersrus': -23.31, 'Potos': -20.09, 'Potsdam':
      52.24, 'Pouso Alegre': -21.7, 'Poznan': 52.24, 'Prabumulih': -4.02, 'Prague': 50.63, 'Praia Grande': -23.31, 'Prato': 44.2, 'Presidente Prudente': -21.7, 'Preston': 53.84, 'Pretoria': -24.92, 'Pringsewu': -5.63, 'Pristina': 42.59, 'Prizren': 42.59, 'Probolinggo': -7.23, 'Proddatur': 15.27, 'Prokopyevsk': 53.84, 'Providence': 42.59, 'Provo': 39.38, 'Pskov': 57.05, 'Pucallpa': -8.84, 'Pudukkottai': 10.45, 'Puebla': 18.48, 'Pueblo': 37.78, 'Puerto Cabello': 10.45, 'Puerto Montt': -40.99, 'PuertoPlata': 20.09, 'Puerto Princesa': 10.45, 'Puerto Vallarta': 20.09, 'Pulandian': 39.38, 'Pune': 18.48, 'Puno': -15.27, 'Punta Arenas': -52.24, 'Punto Fijo': 12.05, 'Puqi': 29.74, 'Puri': 20.09, 'Purnia': 26.52, 'Puruliya': 23.31, 'Purwakarta': -7.23, 'Purwodadi': -7.23, 'Purwokerto': -7.23, 'Purworejo': -7.23, 'Puyang': 36.17, 'Pyatigorsk': 44.2, 'Pyay': 18.48, 'Qabis': 34.56, 'Qalyub': 29.74, 'Qandahar': 31.35, 'Qarchak': 36.17, 'Qazvin': 36.17, 'Qena': 26.52, 'Qianguo': 45.81, 'Qianjiang': 29.74, 'Qingdao': 36.17, 'Qingyuan': 23.31, 'Qinhuangdao': 39.38, 'Qinzhou': 21.7, 'Qiqihar': 47.42, 'Qitaihe': 45.81, 'Qom': 34.56, 'Qostanay': 53.84, 'Quanzhou': 24.92, 'Quchan': 37.78, 'Quebec': 47.42, 'Queenstown': -31.35, 'Queimados': -23.31, 'Quelimane': -18.48, 'Queluz': 39.38, 'Quertaro': 20.09, 'Quetta': 29.74, 'Quetzaltenango': 15.27, 'Quevedo': -0.8, 'Qui Nhon': 13.66, 'Quilpue': -32.95, 'Quito': -0.8, 'Qujing': 24.92, 'Qunduz': 36.17, 'Rabak': 13.66, 'Rabat': 34.56, 'Rach Gia': 10.45, 'Radom': 50.63, 'Rae Bareli': 26.52, 'Rafsanjan': 29.74, 'Raichur': 16.87, 'Raiganj': 24.92, 'Raigarh': 21.7, 'Raipur': 21.7, 'Rajamahendri': 16.87, 'Rajapalaiyam': 8.84, 'Rajkot': 21.7, 'Rajpur': 23.31, 'Rajshahi': 24.92, 'Raleigh': 36.17, 'Ramat Gan': 32.95, 'Ramnicu Valcea': 45.81, 'Rampur': 28.13, 'Rancaekek': -7.23, 'Rancagua': -34.56, 'Ranchi': 23.31, 'Rancho Cucamonga': 34.56, 'Randfontein': -26.52, 'Ranghulu': 47.42, 'Rangkasbitung': -5.63, 'Rangoon': 16.87, 'Rangpur': 26.52, 'Raniganj': 23.31, 'Rantauprapat': 2.41, 'Rasht': 37.78, 'Ratisbon': 49.03, 'Ratlam': 23.31, 'Raurkela': 21.7, 'Ravenna': 44.2, 'Rawalpindi': 32.95, 'Rawang': 4.02, 'Rayong': 12.05, 'Reading': 50.63, 'Recife': -8.84, 'Recklinghausen': 52.24, 'Reggio Di Calabria': 37.78, 'Regina': 50.63, 'Reims': 49.03, 'Remscheid': 50.63, 'Rengasdengklok': -5.63, 'Rennes': 47.42, 'Reno': 39.38, 'Resende': -21.7, 'Resistencia': -28.13, 'Reutlingen': 49.03, 'Rewa': 24.92, 'Rewari': 28.13, 'Reykjavk': 65.09, 'Reynosa':
      26.52, 'Rialto': 34.56, 'Ribeiro Das Neves': -20.09, 'Ribeiro Pires': -23.31, 'Ribeiro Prto': -21.7, 'Richards Bay': -28.13, 'Richardson': 32.95, 'Richmond': 37.78, 'Riga': 57.05, 'Rijeka': 45.81, 'Rimini': 44.2, 'Rio Branco': -10.45, 'Rio Claro': -21.7, 'Rio Cuarto': -32.95, 'Rio De Janeiro': -23.31, 'Rio Grande': -31.35, 'Riobamba': -2.41, 'Rishra': 23.31, 'Riverside': 34.56, 'Rivne': 50.63, 'Riyadh': 24.92, 'Rizhao': 36.17, 'Robertsonpet': 13.66, 'Rochester': 42.59, 'Rockford': 42.59, 'Rohtak': 28.13, 'Rome': 42.59, 'Rondonpolis': -16.87, 'Rongcheng': 23.31, 'Rosario': -32.95, 'Roseville': 39.38, 'Rostock': 53.84, 'Rostov Na Donu': 47.42, 'Rotherham': 53.84, 'Rotterdam': 52.24, 'Rouen': 49.03, 'Roxas': 12.05, 'Rubtsovsk': 52.24, 'Ruda Slaska': 50.63, 'Ruian': 28.13, 'Ruiru': -0.8, 'Ruse': 44.2, 'Rustenburg': -26.52, 'Ryazan': 53.84, 'Rybinsk': 58.66, 'Rybnik': 50.63, 'Rzeszow': 50.63, 'So Bernardo Do Campo': -23.31, 'So Caetano Do Sul': -23.31, 'So Carlos': -21.7, 'So Gonalo': -23.31, 'So Joo De Meriti': -23.31, 'So Jos': -28.13, 'So Jos Do Rio Prto': -20.09, 'So Jos Dos Campos': -23.31, 'So Jos Dos Pinhais': -24.92, 'So Leopoldo': -29.74, 'So Lus': -2.41, 'So Paulo': -23.31, 'So Vicente': -23.31, 'Saarbrcken': 49.03, 'Sabadell': 40.99, 'Sabar': -20.09, 'Sabha': 26.52, 'Sabratah': 32.95, 'Sabzevar': 36.17, 'Sacramento': 37.78, 'Sadiqabad': 28.13, 'Safaqis': 34.56, 'Saga': 32.95, 'Sagamihara': 36.17, 'Sagar': 23.31, 'Saharanpur': 29.74, 'Saharsa': 26.52, 'Sahiwal': 31.35, 'Saint tienne': 45.81, 'Saint Denis': -21.7, 'Saint Helens': 53.84, 'Saint Louis': 16.87, 'Saint Paul': 45.81, 'Saint Petersburg': 60.27, 'Saitama': 36.17, 'Sakai': 34.56, 'Sakata': 39.38, 'Sakura': 36.17, 'Salalah': 16.87, 'Salamanca': 20.09, 'Salatiga': -7.23, 'Salavat': 53.84, 'Salem': 44.2, 'Salerno': 40.99, 'Salihorsk':
      52.24, 'Salinas': 36.17, 'Salt Lake City': 40.99, 'Salta': -24.92, 'Saltillo': 24.92, 'Salto': -31.35, 'Salvador': -13.66, 'Salzburg': 47.42, 'Salzgitter': 52.24, 'Samara': 53.84, 'Samarinda': -0.8, 'Samarkand': 39.38, 'Sambalpur': 21.7, 'Sambhal': 28.13, 'Samsun': 40.99, 'Samut Prakan': 13.66, 'San Antonio': 29.74, 'San Bernardino': 34.56, 'San Bernardo': -32.95, 'San Carlos De Bariloche': -40.99, 'San Cristbal': 18.48, 'San Diego': 32.95, 'San Fernando': 15.27, 'San Francisco': 37.78, 'San Francisco De Macors': 20.09, 'San Jos': 10.45, 'San Jose': 37.78, 'San Juan': -31.35, 'San Juan Del Ro': 20.09, 'San Juan Sacatepquez': 15.27, 'San Lorenzo': -24.92, 'San Luis': -32.95, 'San Luis Potos': 21.7, 'San Luis Ro Colorado': 32.95, 'San Martin': -32.95, 'San Mateo': 15.27, 'San Miguelito': 8.84, 'San Nicols De Los Garza':
      26.52, 'San Nicolas': -32.95, 'San Pdro': 5.63, 'San Pablo': 13.66, 'San Pablo De Las Salinas': 20.09, 'San Pedro': 13.66, 'San Pedro De Macors': 18.48, 'San Pedro Sula': 15.27, 'San Rafael': -34.56, 'San Salvador': 13.66, 'Sanandaj': 34.56, 'Sanbu': 21.7, 'Sanchung': 24.92, 'Sancti Spritus': 21.7, 'Sanda': 34.56, 'Sandakan': 5.63, 'Sanhsia': 24.92, 'Sanmenxia': 34.56, 'Sanming': 26.52, 'Santa Ana': 13.66, 'Santa Catarina': 26.52, 'Santa Clara': 21.7, 'Santa Clarita': 34.56, 'Santa Cruz': 13.66, 'Santa Cruz De Tenerife': 28.13, 'Santa Cruz Do Sul': -29.74, 'Santa Fe': -31.35, 'Santa Luzia': -20.09, 'Santa Maria': -29.74, 'Santa Marta': 10.45, 'Santa Rita': -7.23, 'Santa Rosa': 13.66, 'Santa Teresa': 10.45, 'Santander': 44.2, 'Santarm': -2.41, 'Santiago': -32.95, 'Santiago De Cuba': 20.09, 'Santiago Del Estero': -28.13, 'Santo Andr': -23.31, 'Santo Domingo': 18.48, 'Santos': -23.31, 'Sapele': 5.63, 'Sapucaia': -29.74, 'Saqqez': 36.17, 'Sarajevo': 44.2, 'Saransk': 53.84, 'Sarapul': 57.05, 'Saratov': 52.24, 'Sargodha': 31.35, 'Sarh': 8.84, 'Sari': 36.17, 'Sasaram': 24.92, 'Sasebo': 32.95, 'Saskatoon': 52.24, 'Sassari': 40.99, 'Satara': 16.87, 'Satkhira': 23.31, 'Satna': 24.92, 'Satu Mare': 47.42, 'Savannah': 31.35, 'Saveh': 34.56, 'Sawai Madhopur': 26.52, 'Sawangan': -5.63, 'Sayama': 36.17, 'Scottsdale': 32.95, 'Seattle': 47.42, 'Sekondi': 5.63, 'Sekudai': 0.8, 'Selam': 12.05, 'Semarang': -7.23, 'Semey': 50.63, 'Semnan': 36.17, 'Seoni': 21.7, 'Seoul': 37.78, 'Sepatan': -5.63, 'Serang': -5.63, 'Serekunda': 13.66, 'Seremban': 2.41, 'Sergiyev Posad': 57.05, 'Serpukhov': 55.45, 'Serra': -20.09, 'Setbal': 39.38, 'Sete Lagoas': -20.09, 'Seto': 36.17, 'Severodvinsk': 65.09, 'Seversk': 57.05, 'Sevilla': 37.78, 'Shagamu': 7.23, 'Shah Alam': 2.41, 'Shahe': 36.17, 'Shahjahanpur': 28.13, 'Shahr E Kord': 32.95, 'Shahreza': 31.35, 'Shahrud': 36.17, 'Shakhty': 47.42, 'Shaki': 8.84, 'Shanghai': 31.35, 'Shangqiu': 34.56, 'Shangrao': 28.13, 'Shantipur': 23.31, 'Shaoguan': 24.92, 'Shaowu': 28.13, 'Shaoxing': 29.74, 'Shaoyang': 26.52, 'Shaping': 23.31, 'Sharjah': 24.92, 'Shashi': 29.74, 'Sheffield': 53.84, 'Shekhupura': 31.35, 'Shenyang': 40.99, 'Shenzhen': 23.31, 'Sherbrooke': 45.81, 'Sherpur': 24.92, 'Shihezi': 44.2, 'Shikarpur': 28.13, 'Shiliguri': 26.52, 'Shillong': 24.92, 'Shilong': 23.31, 'Shimla': 31.35, 'Shimoga': 13.66, 'Shimonoseki': 34.56, 'Shinyanga': -4.02, 'Shiraz': 29.74, 'Shishou': 29.74, 'Shiyan': 32.95, 'Shizuishan': 39.38, 'Sholapur': 18.48, 'Shreveport': 32.95, 'Shrirampur': 23.31, 'Shuangcheng': 45.81, 'Shuangyashan': 47.42, 'Shulin': 24.92, 'Shunyi': 39.38, 'Shymkent': 42.59, 'Si Racha': 13.66, 'Sialkot': 32.95, 'Siauliai': 55.45, 'Sibiu': 45.81, 'Sibu': 2.41, 'Sidoarjo': -7.23, 'Siegen': 50.63, 'Siirt': 37.78, 'Sikar': 28.13, 'Sikasso': 10.45, 'Silchar': 24.92, 'Simi Valley': 34.56, 'Sincelejo': 8.84, 'Singapore': 0.8, 'Singaraja': -8.84, 'Singkawang': 0.8, 'Sinnar': 13.66, 'Sioux Falls': 44.2, 'Sirajganj': 24.92, 'Sirjan': 29.74, 'Sirsa': 29.74, 'Sitapur': 28.13, 'Sivas': 39.38, 'Siverek': 37.78, 'Siwan': 26.52, 'Skopje': 42.59, 'Slough': 52.24, 'Smolensk': 55.45, 'Soacha': 4.02, 'Sobral': -4.02, 'Soc Trang': 8.84, 'Sochi': 44.2, 'Sofia': 42.59, 'Sogamoso': 5.63, 'Sohag': 26.52, 'Soka': 36.17, 'Sokod': 8.84, 'Sokoto': 13.66, 'Soledad': 10.45, 'Solikamsk': 60.27, 'Solingen': 50.63, 'Somerset West': -34.56, 'Songea': -10.45, 'Sonipat': 28.13, 'Soreang': -7.23, 'Sorocaba': -23.31, 'Sorong': -0.8, 'Sosnowiec': 50.63, 'Soubr': 5.63, 'South Bend': 40.99, 'Southampton': 50.63, 'Southend On Sea': 52.24, 'Soweto': -26.52, 'Soyapango': 13.66, 'Spanish Town': 18.48, 'Split': 44.2, 'Spokane': 47.42, 'Spring Valley': 36.17, 'Springfield': 37.78, 'Springs': -26.52, 'Srikakulam': 18.48, 'Srinagar': 34.56, 'Stamford': 40.99, 'Stara Zagora': 42.59, 'Staryy Oskol': 50.63, 'Stavanger': 58.66, 'Stavropol': 44.2, 'Sterling Heights': 42.59, 'Sterlitamak': 53.84, 'Stockholm': 58.66, 'Stockport': 53.84, 'Stockton': 37.78, 'Stoke On Trent': 52.24, 'Strasbourg': 49.03, 'Stuttgart': 49.03, 'Subang': -7.23, 'Suceava': 47.42, 'Sucre': -18.48, 'Sudbury': 45.81, 'Suez': 29.74, 'Suihua': 47.42, 'Suining': 29.74, 'Suita': 34.56, 'Sujiatun': 40.99, 'Sukabumi': -7.23, 'Sukaraja': -7.23, 'Sukkur': 28.13, 'Suleja': 8.84, 'Sullana': -5.63, 'Sultanpur': 26.52, 'Sumar': -23.31, 'Sumedang': -7.23, 'Sumy': 50.63, 'Sunderland': 55.45, 'Sungai Petani': 5.63, 'Sunggal': 4.02, 'Sunnyvale': 37.78, 'Sunrise Manor': 36.17, 'Sur': 32.95, 'Surabaya': -7.23, 'Surakarta': -7.23, 'Surat': 21.7, 'Surat Thani': 8.84, 'Surendranagar': 23.31, 'Surgut': 61.88, 'Suriapet': 16.87, 'Surt': 31.35, 'Susah': 36.17, 'Sutton Coldfield': 52.24, 'Suzano': -23.31, 'Suzhou': 31.35, 'Suzuka': 34.56, 'Swansea': 52.24, 'Swindon': 52.24, 'Sydney': -34.56, 'Syktyvkar': 61.88, 'Syracuse': 37.78, 'Syzran': 53.84, 'Szkesfehrvr': 47.42, 'Szczecin': 53.84, 'Szeged': 45.81, 'Ttouan': 36.17, 'Trkmenabat': 39.38, 'Taboo Da Serra': -23.31, 'Tabora': -5.63, 'Tabriz': 37.78, 'Tabuk': 28.13, 'Tachikawa': 36.17, 'Tacloban': 12.05, 'Tacna': -18.48, 'Tacoma': 47.42, 'Tadepallegudem': 16.87, 'Taganrog': 47.42, 'Tagum': 7.23, 'Taian': 36.17, 'Taicheng': 21.7, 'Taichung': 24.92, 'Tainan': 23.31, 'Taipei': 24.92, 'Taiping': 4.02, 'Taitung': 23.31, 'Taiyuan': 37.78, 'Taizhou': 32.95, 'Tajimi': 36.17, 'Takaoka': 36.17, 'Takarazuka': 34.56, 'Takasaki': 36.17, 'Takatsuki': 34.56, 'Takoradi': 5.63, 'Talara': -4.02, 'Talca': -36.17, 'Talcahuano': -36.17, 'Tali': 24.92, 'Talisay': 10.45, 'Talkha': 31.35, 'Tallahassee': 29.74, 'Tallinn': 58.66, 'Tama': 36.17, 'Tamale': 8.84, 'Taman': -7.23, 'Tambaram': 13.66, 'Tambov': 52.24, 'Tambun': -5.63, 'Tampa': 28.13, 'Tampere': 61.88, 'Tampico': 21.7, 'Tandil': -37.78, 'Tando Adam': 26.52, 'Tanete': -5.63, 'Tanga': -5.63, 'Tangerang': -5.63, 'Tanggu': 39.38, 'Tangier': 36.17, 'Tangshan': 37.78, 'Tanjung Morawa': 4.02, 'Tanshui': 24.92, 'Tanta': 31.35, 'Tanza': 15.27, 'Taonan': 45.81, 'Taoyan': 24.92, 'Tapachula': 15.27, 'Taranto': 40.99, 'Taraz': 42.59, 'Targu Mures': 45.81, 'Tarhunah': 32.95, 'Tarija': -21.7, 'Tarlac': 15.27, 'Tarnow': 50.63, 'Tarragona': 40.99, 'Tarsus': 37.78, 'Tartu': 58.66, 'Tartus': 34.56, 'Tashkent': 40.99, 'Tasikmalaya': -7.23, 'Taubat': -23.31, 'Taunggyi': 20.09, 'Tauranga': -37.78, 'Tawau': 4.02, 'Taytay': 15.27, 'Tbilisi': 40.99, 'Tefilo Otoni': -18.48, 'Tebingtinggi': 4.02, 'Tegal': -7.23, 'Tegucigalpa': 13.66, 'Tehuacn': 18.48, 'Tekirdag': 40.99, 'Tel Aviv Yafo': 31.35, 'Teluknaga': -5.63, 'Tema': 5.63, 'Tembisa': -26.52, 'Temirtau': 50.63, 'Tempe': 32.95, 'Temuco': -39.38, 'Tenali': 16.87, 'Tengzhou': 34.56, 'Tepic': 21.7, 'Terespolis': -21.7, 'Teresina': -5.63, 'Termiz': 37.78, 'Ternate': 0.8, 'Terni': 42.59, 'Terrassa': 40.99, 'Teshie': 5.63, 'Tete': -16.87, 'Texcoco': 20.09, 'Thi Nguyn': 21.7, 'Thana':
      18.48, 'Thanesar': 29.74, 'Thanh Ha': 20.09, 'Thanjavur': 10.45, 'Thanyaburi': 13.66, 'Thaton': 16.87, 'The Hague': 52.24, 'Thessalonki': 40.99, 'This': 15.27, 'Thiruvananthapuram': 8.84, 'Thornton': 39.38, 'Thousand Oaks': 34.56, 'Thrissur': 10.45, 'Tianjin': 39.38, 'Tianmen': 31.35, 'Tieli': 47.42, 'Tieling': 42.59, 'Tighina': 47.42, 'Tijuana': 32.95, 'Tilburg': 52.24, 'Timisoara': 45.81, 'Timon': -5.63, 'Tirana': 40.99, 'Tiruchchirappalli': 10.45, 'Tirunelveli': 8.84, 'Tirupati': 13.66, 'Tiruppur': 10.45, 'Tiruvannamalai': 12.05, 'Tiruvottiyur': 13.66, 'Titagarh': 23.31, 'Tlalnepantla': 20.09, 'Tlaquepaque': 20.09, 'Toamasina': -18.48, 'Toda': 36.17, 'Tokat': 40.99, 'Tokorozawa': 36.17, 'Tokuyama': 34.56, 'Tokyo': 36.17, 'Toledo': 10.45, 'Toliary': -23.31, 'Toluca': 18.48, 'Tolyatti': 53.84, 'Tomakomai': 42.59, 'Toms River': 39.38, 'Tomsk': 57.05, 'Tonal': 20.09, 'Tondabayashi': 34.56, 'Tongchuan': 34.56, 'Tongliao': 44.2, 'Tongling': 31.35, 'Tongzhou': 39.38, 'Tonk': 26.52, 'Topeka': 39.38, 'Toronto': 44.2, 'Torrance': 34.56, 'Torren': 24.92, 'Torrejn De Ardoz': 40.99, 'Torun': 52.24, 'Tottori': 34.56, 'Touliu': 23.31, 'Toulon': 42.59, 'Toulouse': 44.2, 'Toungoo': 18.48, 'Tours': 47.42, 'Townsville': -18.48, 'Toyohashi': 34.56, 'Toyokawa': 34.56, 'Toyonaka': 34.56, 'Toyota': 34.56, 'Trabzon': 40.99, 'Trelew': -42.59, 'Trento': 45.81, 'Trier': 49.03, 'Trieste': 45.81, 'Trincomalee': 8.84, 'Tripoli': 32.95, 'Trois Rivires': 45.81, 'Trondheim': 63.49, 'Trujillo': -8.84, 'Tshikapa': -5.63, 'Tsuchiura': 36.17, 'Tsukuba': 36.17, 'Tubruq': 31.35, 'Tucheng': 24.92, 'Tucson': 31.35, 'Tucuman': -26.52, 'Tuguegarao': 18.48, 'Tula': 53.84,
        'Tulancingo': 20.09, 'Tulsa': 36.17, 'Tulu': 4.02, 'Tumbes': -4.02, 'Tumkur': 13.66, 'Tungi': 23.31, 'Tunis': 36.17, 'Tunja': 5.63, 'Turgutlu': 37.78, 'Turhal': 40.99, 'Turin': 45.81, 'Turku': 60.27, 'Turmero': 10.45, 'Tuxtla Gutirrez': 16.87, 'Tuzla': 44.2, 'Tver': 57.05, 'Tychy': 50.63, 'Tyumen': 57.05, 'Ube': 34.56, 'Uberaba':
      -20.09, 'Uberlndia': -18.48, 'Ubon Ratchathani': 15.27, 'Udgir': 18.48, 'Udon Thani': 16.87, 'Udupi': 13.66, 'Ueda': 36.17, 'Ufa': 55.45, 'Ugep': 5.63, 'Uitenhage': -34.56, 'Uji': 34.56, 'Ujjain': 23.31, 'Ukhta': 63.49, 'Ulaanbaatar': 47.42, 'Ulan Ude': 52.24, 'Ulhasnagar': 18.48, 'Ulm': 49.03, 'Ulubaria': 23.31, 'Ulyanovsk': 53.84, 'Umm Durman': 15.27, 'Umuahia': 5.63, 'Ungaran': -7.23, 'Unnao': 26.52, 'Uppsala': 60.27, 'Urayasu': 36.17, 'Urdaneta': 15.27, 'Urfa': 37.78, 'Uromi': 7.23, 'Uruapan': 20.09, 'Uruguaiana': -29.74, 'Usak': 39.38, 'Ussuriysk': 44.2, 'Ust Ilimsk': 58.66, 'Utrecht': 52.24, 'Uvira': -4.02, 'Uyo': 5.63, 'Uzhhorod': 49.03, 'Vrzea Grande': -15.27, 'Vrzea Paulista': -23.31, 'Vsters': 60.27, 'Vadodara': 21.7, 'Valdivia': -39.38, 'Valencia': 39.38, 'Valladolid': 40.99, 'Valledupar': 10.45, 'Vallejo':
      37.78, 'Valparaiso': -32.95, 'Van': 37.78, 'Vanadzor': 40.99, 'Vancouver': 49.03, 'Vanderbijlpark': -26.52, 'Varamin': 36.17, 'Varanasi': 24.92, 'Varginha': -21.7, 'Varna': 42.59, 'Vejalpur': 23.31, 'Velikie Luki': 57.05, 'Velikiy Novgorod': 58.66, 'Velluru': 12.05, 'Venice': 45.81, 'Veracruz': 18.48, 'Veraval': 21.7, 'Vereeniging': -26.52, 'Verona': 45.81, 'Verwoerdburg': -26.52, 'Viamo': -29.74, 'Vicenza': 45.81, 'Victoria': 49.03, 'Vidisha': 23.31, 'Vienna': 49.03, 'Vientiane': 18.48, 'Vigo': 42.59, 'Vihari': 29.74, 'Vijayawada': 16.87, 'Vila Velha': -20.09, 'Villa Canales': 15.27, 'Villa Nueva': 15.27, 'Villahermosa': 18.48, 'Villavicencio': 4.02, 'Villeurbanne': 45.81, 'Vilnius': 55.45, 'Vina Del Mar': -32.95, 'Vinh': 18.48, 'Vinh Long': 10.45, 'Vinnitsa': 49.03, 'Vinnytsya': 49.03, 'Viransehir': 37.78, 'Virar': 20.09, 'Virginia': -28.13, 'Virginia Beach': 36.17, 'Visakhapatnam': 18.48, 'Visalia': 36.17, 'Vitria': -20.09, 'Vitria Da Conquista': -15.27, 'Vitria De Santo Anto':
      -8.84, 'Vitoria': 42.59, 'Vizianagaram': 18.48, 'Vladikavkaz': 42.59, 'Vladimir': 55.45, 'Vladivostok': 42.59, 'Volgodonsk': 47.42, 'Volgograd': 49.03, 'Vologda': 58.66, 'Volta Redonda': -21.7, 'Volzhskiy': 49.03, 'Voronezh': 52.24, 'Vryheid': -28.13, 'Vung Tau': 10.45, 'Wrzburg': 49.03, 'Waco': 31.35, 'Wad Madani': 13.66, 'Wah':
      34.56, 'Wahran': 36.17, 'Waitakere': -36.17, 'Walbrzych': 50.63, 'Walsall': 52.24, 'Wanxian': 31.35, 'Warangal': 18.48, 'Wardha': 20.09, 'Warqla': 31.35, 'Warren': 42.59, 'Warri': 5.63, 'Warsaw': 52.24, 'Waru': -7.23, 'Washington': 39.38, 'Waterbury': 40.99, 'Waterloo': 44.2, 'Watford': 52.24, 'Waw': 7.23, 'Wazirabad': 32.95, 'Weifang': 36.17, 'Weihai': 37.78, 'Weinan': 34.56, 'Welkom': -28.13, 'Wellington': -40.99, 'Wencheng': 37.78, 'Wenzhou': 28.13, 'Weru': -7.23, 'West Bromwich': 52.24, 'West Covina': 34.56, 'West Jordan': 40.99, 'West Valley City': 40.99, 'Westminster': 39.38, 'Westonaria': -26.52, 'Wichita': 37.78, 'Wichita Falls': 34.56, 'Wiesbaden': 50.63, 'Windhoek': -23.31, 'Windsor': 42.59, 'Winnipeg': 50.63, 'Winston Salem': 36.17, 'Witbank': -26.52, 'Witten': 52.24, 'Wloclawek': 52.24, 'Wolfsburg': 52.24,
        'Wollongong': -34.56, 'Wolverhampton': 52.24, 'Worcester': -32.95, 'Wroclaw': 50.63, 'Wuda': 39.38, 'Wufeng': 28.13, 'Wuhan': 29.74, 'Wuhu': 31.35, 'Wulanhaote': 45.81, 'Wuning': 29.74, 'Wuppertal': 50.63, 'Wuwei': 37.78, 'Wuxi': 31.35, 'Wuxue': 29.74, 'Wuzhou': 23.31, 'Xai Xai': -24.92, 'Xalapa': 20.09, 'Xiamen': 24.92, 'Xian': 34.56, 'Xiangdong': 28.13, 'Xiangfan': 32.95, 'Xiantao': 29.74, 'Xianyang': 34.56, 'Xiaolan': 23.31, 'Xiazhen': 34.56, 'Xichang': 28.13, 'Xico': 20.09, 'Xingtai': 37.78, 'Xingyi': 24.92, 'Xining': 36.17, 'Xinpu': 34.56, 'Xintai': 36.17, 'Xinxiang': 36.17, 'Xinyang': 32.95, 'Xinzhou': 37.78, 'Xuanhua': 40.99, 'Xuanzhou': 31.35, 'Xuchang': 34.56, 'Xuzhou': 34.56, 'Yanlin': 24.92, 'Yaan': 29.74, 'Yachiyo': 36.17, 'Yaizu': 34.56, 'Yakeshi': 49.03, 'Yamoussoukro': 7.23, 'Yamunanagar': 29.74, 'Yanan': 36.17, 'Yancheng': 32.95, 'Yangjiang': 21.7, 'Yangmei': 24.92, 'Yangzhou': 32.95, 'Yanji': 42.59, 'Yantai': 37.78, 'Yao': 34.56, 'Yaound': 4.02, 'Yaroslavl': 57.05, 'Yatsushiro': 32.95, 'Yavatmal': 20.09, 'Yazd': 31.35, 'Yekaterinburg': 57.05, 'Yelahanka': 13.66, 'Yelets': 52.24, 'Yenangyaung': 20.09, 'Yerevan': 40.99, 'Yevpatoriya': 45.81, 'Yibin': 28.13, 'Yichang': 31.35, 'Yichun': 28.13, 'Yidu': 36.17, 'Yinchuan': 37.78, 'Yingcheng': 24.92, 'Yingkou': 40.99, 'Yingzhong': 31.35, 'Yining':
      44.2, 'Yiyang': 28.13, 'Yizheng': 32.95, 'Yogyakarta': -7.23, 'Yokkaichi': 34.56, 'Yokosuka': 34.56, 'Yonago': 36.17, 'Yongan': 26.52, 'Yonkers': 40.99, 'York': 53.84, 'Yuci': 37.78, 'Yueyang': 29.74, 'Yulin': 21.7, 'Yuncheng': 34.56, 'Yungho': 24.92, 'Yungkang': 23.31, 'Yushan': 31.35, 'Yushu': 44.2, 'Yuyao': 29.74, 'Zaanstad': 52.24, 'Zabol': 31.35, 'Zabrze': 50.63, 'Zacatecas': 23.31, 'Zagreb': 45.81, 'Zalantun': 47.42, 'Zama': 36.17, 'Zamboanga': 7.23, 'Zamora': 20.09, 'Zanjan': 36.17, 'Zanzibar': -5.63, 'Zaoyang': 31.35, 'Zaozhuang': 34.56, 'Zapopan': 20.09, 'Zaporizhzhya': 47.42, 'Zaragoza': 40.99, 'Zaria': 10.45, 'Zelenodolsk': 55.45, 'Zelenograd':
      55.45, 'Zenica': 44.2, 'Zhangdian': 36.17, 'Zhangjiakou': 40.99, 'Zhangzhou': 24.92, 'Zhanjiang': 21.7, 'Zhaocheng': 37.78, 'Zhaodong': 45.81, 'Zhaoqing': 23.31, 'Zhaotong': 26.52, 'Zhaoyang': 32.95, 'Zhenjiang': 32.95, 'Zhezkazgan': 47.42, 'Zhicheng': 29.74, 'Zhongshan': 21.7, 'Zhoucheng': 24.92, 'Zhoucun': 36.17, 'Zhoukou': 32.95, 'Zhucheng': 36.17, 'Zhuhai': 21.7, 'Zhuji': 29.74, 'Zhukovskiy': 55.45, 'Zhumadian': 32.95, 'Zhuozhou': 39.38, 'Zhuzhou': 28.13, 'Zhytomyr': 50.63, 'Zielona Gora': 52.24, 'Zigong': 29.74, 'Ziguinchor': 12.05, 'Zinder': 13.66, 'Zlatoust': 55.45, 'Zoetermeer': 52.24, 'Zonguldak': 40.99, 'Zouxian': 36.17, 'Zunyi': 28.13, 'Zurich': 47.42, 'Zuwarah': 32.95, 'Zwolle': 52.24
    };

    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        })
      ],
      loadTilesWhileAnimating: true,
      view: view
    });
    function CenterMap(long, lat) {
      console.log("Long: " + long + " Lat: " + lat);
      map.getView().setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
    }
    CenterMap(77.5946, 12.9716);
    map.on('click', function (evt) {
      var coord = map.getCoordinateFromPixel(evt.pixel);
      var newpos = ol.proj.transform(coord, 'EPSG:900913', 'EPSG:4326');
      var retVal = confirm("Latitude is "+newpos[1]+" Do you want to continue ?");
      if (retVal == true) {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value = "";
        document.getElementById("lat").value = newpos[1];
        document.getElementById("submit").click();
      }
      else {
        alert("Ok !");
      }
    });
    function onClick(id, callback) {
      document.getElementById(id).addEventListener('click', callback);
    }
    function flyTo(location, done) {
      var duration = 2000;
      var zoom = view.getZoom();
      var parts = 2;
      var called = false;

      function callback(complete) {
        --parts;
        if (called) {
          return;
        }
        if (parts === 0 || !complete) {
          called = true;
          done(complete);
        }
      }
      view.animate({
        center: location,
        duration: duration
      }, callback);
      view.animate({
        zoom: zoom - 1,
        duration: duration / 2
      }, {
          zoom: zoom,
          duration: duration / 2
        }, callback);
    }

    onClick('fly-to-bern', function () {
      flyTo(Bern, function () { });
      var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele=document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Bern";
        document.getElementById("lat").value=47.42;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-bangalore', function () {
      flyTo(Bangalore, function () { });
      var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Bangalore";
        document.getElementById("lat").value=12.05;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-chennai', function () {
      flyTo(Chennai, function () { });
        var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Chennai";
        document.getElementById("lat").value=13.66;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-delhi', function () {
        flyTo(Delhi, function () { });
          var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Delhi";
        document.getElementById("lat").value=28.13;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });  
    onClick('fly-to-newyork', function () {
        flyTo(NewYork, function () { });
            var delayInMilliseconds = 2500; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="New York";
        document.getElementById("lat").value=40.99;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-mumbai', function () {
        flyTo(Mumbai, function () { });
          var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Bombay";
        document.getElementById("lat").value=18.48;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-singapore', function () {
        flyTo(Singapore, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Singapore";
        document.getElementById("lat").value=0.8;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-moscow', function () {
        flyTo(Moscow, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Moscow";
        document.getElementById("lat").value=55.45;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-tokyo', function () {
        flyTo(Tokyo, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Tokyo";
        document.getElementById("lat").value=31.35;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-shanghai', function () {
        flyTo(Shanghai, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Shanghai";
        document.getElementById("lat").value=21.7;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-surat', function () {
        flyTo(Surat, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Surat";
        document.getElementById("lat").value= 23.31;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-kolkata', function () {
        flyTo(Kolkata, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Calcutta";
        document.getElementById("lat").value= -36.17;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-canberra', function () {
        flyTo(Canberra, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Canberra";
        document.getElementById("lat").value= 49.03;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    });
    onClick('fly-to-paris', function () {
        flyTo(Paris, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Paris";
        document.getElementById("lat").value= 49.03;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    }); 
    onClick('fly-to-berlin', function () {
        flyTo(Berlin, function () { });
            var delayInMilliseconds = 2000; //1 second
      setTimeout(function () {
        var ele = document.getElementById("city_form");
        ele.setAttribute("action", "city_display.php");
        document.getElementById("city_name").value="Berlin";
        document.getElementById("lat").value= 52.24;
        document.getElementById("submit").click();

      }, delayInMilliseconds);
    }); 
        onClick('submit2', function () {
              var ele = document.getElementById("city_form2");
              ele.setAttribute("action", "city_display.php");
              var lat= document.getElementById("lat1");
              var city_name=document.getElementById("city_name2");
              var str= city_name.value;
              str=str.trim();
              str=str.toLowerCase();
              str=str.replace(str.charAt(0),str.charAt(0).toUpperCase());
              if(str in dict)
              {
                var c=confirm("City found in the database , do you want to continue ?");
                lat.value=dict[str];
                city_name.value=str;
                if(c==true) 
                  document.getElementById("submit3").click();
                else
                  alert("OK !")
              }
              else
              {
                alert("City not found in Database to give detailed report. So please manually select place from Map");
              }
          });
        function tour() {
          var locations = [Bern, Bangalore, Chennai, Delhi, NewYork, Mumbai, Singapore, Moscow, Tokyo, Shanghai, Surat, Kolkata, Canberra, Paris, Berlin];
          var index = -1;
          function next(more) {
            if (more) {
              ++index;
              if (index < locations.length) {
                var delay = index === 0 ? 0 : 750;
                setTimeout(function () {
                  flyTo(locations[index], next);
                }, delay);
              } else {
                alert('Tour complete');
              }
            } else {
              alert('Tour cancelled');
            }
          }
          next(true);
        }
        onClick('tour', tour);
</script>
</body>
</html>