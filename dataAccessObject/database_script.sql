create database abdel_websho;
use abdel_webshop;
CREATE TABLE users (
    user_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255)NOT NULL
);
alter table users add unique (email);

CREATE TABLE products (
    product_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(MAX) NOT NULL,
    price DECIMAL(10,2)NOT NULL,
    filename varchar(255)NOT NULL
);

INSERT INTO `products`( `name`, `description`, `price`, `filename`) VALUES (
    'BLACK+DECKER elektrische grastrimmer BESTA530-CM',
    'De BLACK+DECKER elektrische grastrimmer BESTA530-CM is een veelzijdige machine. De grastrimmer heeft een lichte, telescopische verstelbare steel waardoor de machine voor iedereen comfortabel te gebruiken is. En met de extra handgreep met softgrip heb je een goede controle over je handgreep. De automatische draadtoevoer zorgt dat het trimdraad altijd de optimale werklengte heeft en voorkomt vieze handen. De grastrimmer werkt op netspanning en heeft een vermogen van 550 Watt. Met de maaibreedte van 30 cm is de machine perfect voor in grotere tuinen. De BESTA530-CM grastrimmer heeft 3 verschillende functies. Het kan maaien, trimmen en kant snijden. Doormiddel van het Click & Go systeem wissel je gemakkelijk van functie. De trimmer heeft de E-Drive technologie die zorgt dat ook zwaarder trimwerk mogelijk is. De lichte wielbasis zorgt ervoor dat je de maaier kan gebruiken op kleine egale oppervlakten. En deze machine is compact op te bergen vergeleken met een traditionele grasmaaier. De grastrimmer wordt geleverd met een plantenbeschermbeugel. Kortom, de BLACK+DECKER elektrische grastrimmer BESTA530-QS is een fijn hanteerbare machine.
',
86.99,
    'images/1.jfif'),
    ('Gardena robotmaaier Sileno city 470m²',
    'Gazonverzorging kan zo eenvoudig en moeiteloos zijn, zelfs in stadstuinen! Met zijn SensorCut systeem maait de GARDENA SILENO city uw gras op een nauwkeurige en betrouwbare manier. U geniet van uw vrije tijd en een perfect onderhouden gazon. De SILENO city is geschikt voor kleinere gazons tot 470 vierkante meter. Hij maait op hellingen tot 25% en ook smalle doorgangen zijn geen probleem. Het zwenkbare achterwiel geeft de robotmaaier zijn uitstekende flexibiliteit en wendbaarheid, ideaal voor kleine en smalle tuinen. De nieuwe SILENO city werkt tijdens alle weersomstandigheden en is zo stil dat hij nauwelijks gehoord zal worden. Als het werk klaar is, keert hij automatisch terug naar het laadstation. Tijdens de installatie leidt de installatiehulp u door de menu\'s en berekent hij een maaiplan. De maaitijden kunt u ook zelf instellen. De robotmaaier werkt alleen wanneer u dat wilt.',
    999.00,
    'images/2.jfif'),
    ('LUX accu- en lader starterset 20V 2,0Ah',
    'De LUX accu en lader set 20V bestaat uit een LUX accu 20V / 2Ah en een LUX acculader 20V. Het volladen van de 2Ah accu duurt ongeveer een uur met de acculader 20V. De accu is onderdeel van het LUX accuplatform. Dit betekent dat je deze accu kan gebruiken met alle LUX 20V (tuin)machines.',
    36.99,
    'images/3.jfif'),
    ('LUX 20V accu heggenschaar (zonder accu)',
    'De LUX accu heggenschaar geeft je alle vrijheid tijdens het snoeien. Omdat de machine gebruik maakt van een accu ben je niet meer afhankelijk van een stopcontact of verlengsnoeren.De heggenschaar heeft een zwaardlengte van 520 mm en kan takken snoeien met een maximale dikte van 14 mm. De beschermkap zorgt ervoor dat je veilig kan snoeien. De grote handgreep zorgt ervoor dat je altijd grip hebt op de machine. Ook moet je deze greep ingeknepen houden, anders gaat de heggenschaar niet aan. Zo voorkom je ongelukken!De LUX accu heggenschaar maakt gebruik van de LUX uitwisselbare 20V accu. Deze kan je gebruiken met alle 20V LUX machine, hierdoor kan je al je machines gebruiken met maar één accu. Deze heggenschaar wordt geleverd zonder accu, deze zijn apart verkrijgbaar met een capaciteit van 2Ah of 4Ah.',
    45.99,
'images/4.jfif'),
    ('Little Tikes glijbaan jungle',
    'Deze Little Tikes Jungle glijbaan is groot genoeg om kids urenlang speelplezier te laten beleven, maar kan toch heel eenvoudig worden opgeborgen! Ideaal voor peuters, met makkelijke treden om te klimmen, een brede basis voor stabiliteit en een flauwe helling. En als je kleintje klaar is voor ander speelgoed, dan maakt de Easy Store zijn naam waar en is makkelijk op te vouwen en op te bergen. Lengte van de glijbaan: 180 cm. Met geïntegreerde grepen ter ondersteuning en voor de veiligheid. Deze glijbaan is uitgevoerd in de mooie kleuren donkerblauw, groen en grijs. Afmetingen: 142 x 197 x 120 cm. Wordt geleverd in doos met poster. Geschikt voor kinderen vanaf 2 jaar.',
    149.00,
    'images/5.jfif'
    );