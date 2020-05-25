<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $data="1	@	ADANA	ß
2	@	ADIYAMAN	ß
3	@	AFYONKARAHİSAR	ß
4	@	AĞRI	ß
5	@	AMASYA	ß
6	@	ANKARA	ß
7	@	ANTALYA	ß
8	@	ARTVİN	ß
9	@	AYDIN	ß
10	@	BALIKESİR	ß
11	@	BİLECİK	ß
12	@	BİNGÖL	ß
13	@	BİTLİS	ß
14	@	BOLU	ß
15	@	BURDUR	ß
16	@	BURSA	ß
17	@	ÇANAKKALE	ß
18	@	ÇANKIRI	ß
19	@	ÇORUM	ß
20	@	DENİZLİ	ß
21	@	DİYARBAKIR	ß
22	@	EDİRNE	ß
23	@	ELAZIĞ	ß
24	@	ERZİNCAN	ß
25	@	ERZURUM	ß
26	@	ESKİŞEHİR	ß
27	@	GAZİANTEP	ß
28	@	GİRESUN	ß
29	@	GÜMÜŞHANE	ß
30	@	HAKKARİ	ß
31	@	HATAY	ß
32	@	ISPARTA	ß
33	@	MERSİN	ß
34	@	İSTANBUL	ß
35	@	İZMİR	ß
36	@	KARS	ß
37	@	KASTAMONU	ß
38	@	KAYSERİ	ß
39	@	KIRKLARELİ	ß
40	@	KIRŞEHİR	ß
41	@	KOCAELİ (İZMİT)	ß
42	@	KONYA	ß
43	@	KÜTAHYA	ß
44	@	MALATYA	ß
45	@	MANİSA	ß
46	@	KAHRAMANMARAŞ	ß
47	@	MARDİN	ß
48	@	MUĞLA	ß
49	@	MUŞ	ß
50	@	NEVŞEHİR	ß
51	@	NİĞDE	ß
52	@	ORDU	ß
53	@	RİZE	ß
54	@	SAKARYA (ADAPAZARI)	ß
55	@	SAMSUN	ß
56	@	SİİRT	ß
57	@	SİNOP	ß
58	@	SİVAS	ß
59	@	TEKİRDAĞ	ß
60	@	TOKAT	ß
61	@	TRABZON	ß
62	@	TUNCELİ	ß
63	@	ŞANLIURFA	ß
64	@	UŞAK	ß
65	@	VAN	ß
66	@	YOZGAT	ß
67	@	ZONGULDAK	ß
68	@	AKSARAY	ß
69	@	BAYBURT	ß
70	@	KARAMAN	ß
71	@	KIRIKKALE	ß
72	@	BATMAN	ß
73	@	ŞIRNAK	ß
74	@	BARTIN	ß
75	@	ARDAHAN	ß
76	@	IĞDIR	ß
77	@	YALOVA	ß
78	@	KARABÜK	ß
79	@	KİLİS	ß
80	@	OSMANİYE	ß
81	@	DÜZCE	ß
";

     $array = explode('ß',$data);

     foreach ($array as $value){
         if(!empty($value)){
            $cityArray = explode("@",$value);
            if(!empty($cityArray[1])){
            $city = new City();
            $city->code = ( trim($cityArray[0])<10)?"0".trim($cityArray[0]):trim($cityArray[0]);
            $city->name = trim($cityArray[1]);
            $city->save();
            }
         }

     }




    }
}
