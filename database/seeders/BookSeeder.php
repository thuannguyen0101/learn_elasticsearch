<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Exception\NameException;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $str =   "1 	Người xa lạ 	Albert Camus 	1942 	Tiếng Pháp 	Algérie thuộc Pháp, Pháp[2]
2 	Đi tìm thời gian đã mất 	Marcel Proust 	1913–1927 	Tiếng Pháp 	Pháp
3 	Vụ án 	Franz Kafka 	1925 	Tiếng Đức 	Áo-Hung, Tiệp Khắc
4 	Hoàng tử bé 	Antoine de Saint-Exupéry 	1943 	Tiếng Pháp 	Pháp
5 	Thân phận con người 	André Malraux 	1933 	Tiếng Pháp 	Pháp
6 	Hành trình đến tận cùng đêm tối 	Louis-Ferdinand Céline 	1932 	Tiếng Pháp 	Pháp
7 	Chùm nho thịnh nộ 	John Steinbeck 	1939 	tiếng Anh 	Hoa Kỳ
8 	Chuông nguyện hồn ai 	Ernest Hemingway 	1940 	tiếng Anh 	Hoa Kỳ
9 	Kẻ lãng du 	Alain Fournier 	1913 	Tiếng Pháp 	Pháp
10 	Bọt tháng ngày 	Boris Vian 	1947 	Tiếng Pháp 	Pháp
11 	Giới tính nữ 	Simone de Beauvoir 	1949 	Tiếng Pháp 	Pháp
12 	Trong khi chờ đợi Godot 	Samuel Beckett 	1952 	Tiếng Pháp, tiếng Anh 	Ireland, Pháp
13 	L'Être et le Néant 	Jean-Paul Sartre 	1943 	Tiếng Pháp 	Pháp
14 	Tên của đoá hồng 	Umberto Eco 	1980 	Tiếng Ý 	Ý
15 	Quần đảo ngục tù 	Aleksandr Solzhenitsyn 	1973 	Tiếng Nga 	Liên Xô
16 	Paroles 	Jacques Prévert 	1946 	Tiếng Pháp 	Pháp
17 	Alcools 	Guillaume Apollinaire 	1913 	Tiếng Pháp 	Pháp
18 	Bông sen xanh (trong bộ Tintin) 	Hergé 	1936 	Tiếng Pháp 	Bỉ
19 	Nhật ký Anne Frank 	Anne Frank 	1947 	Tiếng Hà Lan 	Đức, Hà Lan
20 	Nhiệt đới buồn 	Claude Lévi-Strauss 	1955 	Tiếng Pháp 	Pháp
21 	Thế giới mới tươi đẹp 	Aldous Huxley 	1932 	tiếng Anh 	Anh Quốc
22 	Một chín tám tư 	George Orwell 	1949 	tiếng Anh 	Anh Quốc
23 	Astérix người Gaulois 	René Goscinny và Albert Uderzo 	1959 	Tiếng Pháp 	Pháp
24 	La Cantatrice chauve 	Eugène Ionesco 	1952 	Tiếng Pháp, Tiếng România 	România, Pháp
25 	Trois essais sur la théorie sexuelle 	Sigmund Freud 	1905 	Tiếng Đức 	Áo
26 	L'Œuvre au noir 	Marguerite Yourcenar 	1968 	Tiếng Pháp 	Pháp, Bỉ
27 	Lolita 	Vladimir Nabokov 	1955 	tiếng Anh, Tiếng Nga 	Nga, Hoa Kỳ
28 	Ulysses 	James Joyce 	1922 	tiếng Anh 	Ireland
29 	Le Désert des Tartares 	Dino Buzzati 	1940 	Tiếng Ý 	Ý
30 	Bọn làm bạc giả 	André Gide 	1925 	Tiếng Pháp 	Pháp
31 	Le Hussard sur le toit 	Jean Giono 	1951 	Tiếng Pháp 	Pháp
32 	Belle du Seigneur 	Albert Cohen 	1968 	Tiếng Pháp 	Hy Lạp, Thụy Sĩ
33 	Trăm năm cô đơn 	Gabriel García Márquez 	1967 	Tiếng Tây Ban Nha 	Colombia
34 	Âm thanh và cuồng nộ 	William Faulkner 	1929 	tiếng Anh 	Hoa Kỳ
35 	Người vợ cô đơn 	François Mauriac 	1927 	Tiếng Pháp 	Pháp
36 	Zazie trong tàu điện ngầm 	Raymond Queneau 	1959 	Tiếng Pháp 	Pháp
37 	La Confusion des sentiments 	Stefan Zweig 	1927 	Tiếng Đức 	Áo
38 	Cuốn theo chiều gió 	Margaret Mitchell 	1936 	tiếng Anh 	Hoa Kỳ
39 	Người tình của phu nhân Chatterley 	D. H. Lawrence 	1928 	tiếng Anh 	Anh Quốc
40 	Núi thần 	Thomas Mann 	1924 	Tiếng Đức 	Đức
41 	Buồn ơi chào mi 	Françoise Sagan 	1954 	Tiếng Pháp 	Pháp
42 	Sự yên lặng của biển cả 	Vercors 	1942 	Tiếng Pháp 	Pháp
43 	La Vie mode d'emploi 	Georges Perec 	1978 	Tiếng Pháp 	Pháp
44 	Con chó săn của dòng họ Baskerville 	Arthur Conan Doyle 	1901–1902 	tiếng Anh 	Anh Quốc
45 	Sous le soleil de Satan 	Georges Bernanos 	1926 	Tiếng Pháp 	Pháp
46 	Đại gia Gatsby 	F. Scott Fitzgerald 	1925 	tiếng Anh 	Hoa Kỳ
47 	La Plaisanterie 	Milan Kundera 	1967 	Tiếng Séc 	Tiệp Khắc, Pháp
48 	Bóng ma giữa trưa 	Alberto Moravia 	1954 	Tiếng Ý 	Ý
49 	Vụ ám sát ông Roger Ackroyd 	Agatha Christie 	1926 	tiếng Anh 	Anh Quốc
50 	Nadja 	André Breton 	1928 	Tiếng Pháp 	Pháp
51 	Aurelien 	Louis Aragon 	1944 	Tiếng Pháp 	Pháp
52 	Le Soulier de satin 	Paul Claudel 	1929 	Tiếng Pháp 	Pháp
53 	Sáu nhân vật đi tìm tác giả 	Luigi Pirandello 	1921 	Tiếng Ý 	Ý
54 	The Resistible Rise of Arturo Ui 	Bertolt Brecht 	1959 	Tiếng Đức 	Đức
55 	Vendredi ou les Limbes du Pacifique 	Michel Tournier 	1967 	Tiếng Pháp 	Pháp
56 	Chiến tranh giữa các thế giới 	H. G. Wells 	1898 	tiếng Anh 	Anh Quốc
57 	Se questo è un uomo 	Primo Levi 	1947 	Tiếng Ý 	Ý
58 	Chúa tể những chiếc nhẫn 	J. R. R. Tolkien 	1954–1955 	tiếng Anh 	Orange Free State, Anh Quốc
59 	Les Vrilles de la vigne 	Colette 	1908 	Tiếng Pháp 	Pháp
60 	Capitale de la douleur 	Paul Éluard 	1926 	Tiếng Pháp 	Pháp
61 	Martin Eden 	Jack London 	1909 	tiếng Anh 	Hoa Kỳ
62 	Ballad of the Salt Sea 	Hugo Pratt 	1967 	Tiếng Ý 	Ý
63 	Le Degré zéro de l'écriture 	Roland Barthes 	1953 	Tiếng Pháp 	Pháp
64 	Danh dự đã mất của Katharina Blum 	Heinrich Böll 	1974 	Tiếng Đức 	Đức
65 	Bờ biển Syrtes 	Julien Gracq 	1951 	Tiếng Pháp 	Pháp
66 	Les Mots et les Choses 	Michel Foucault 	1966 	Tiếng Pháp 	Pháp
67 	Trên đường 	Jack Kerouac 	1957 	tiếng Anh 	Hoa Kỳ
68 	Cuộc phiêu lưa kỳ diệu của Nils 	Selma Lagerlöf 	1906–1907 	Tiếng Thụy Điển 	Thụy Điển
69 	Căn phòng riêng 	Virginia Woolf 	1929 	tiếng Anh 	Anh Quốc
70 	Biên niên ký Sao Hỏa 	Ray Bradbury 	1950 	tiếng Anh 	Hoa Kỳ
71 	Le Ravissement de Lol V. Stein 	Marguerite Duras 	1964 	Tiếng Pháp 	Pháp
72 	Le Procès-verbal 	J. M. G. Le Clézio 	1963 	Tiếng Pháp 	Pháp
73 	Tropismes 	Nathalie Sarraute 	1939 	Tiếng Pháp 	Nga, Pháp
74 	Journal, 1887–1910 	Jules Renard 	1925 	Tiếng Pháp 	Pháp
75 	Lord Jim 	Joseph Conrad 	1900 	tiếng Anh 	Đế quốc Nga, Anh Quốc
76 	Écrits 	Jacques Lacan 	1966 	Tiếng Pháp 	Pháp
77 	Le Théâtre et son double 	Antonin Artaud 	1938 	Tiếng Pháp 	Pháp
78 	Manhattan Transfer 	John Dos Passos 	1925 	tiếng Anh 	Hoa Kỳ
79 	Ficciones 	Jorge Luis Borges 	1944 	Tiếng Tây Ban Nha 	Argentina
80 	Moravagine 	Blaise Cendrars 	1926 	Tiếng Pháp 	Pháp, Thụy Sĩ
81 	Viên tướng của đạo quân chết 	Ismail Kadare 	1963 	Tiếng Albania, Tiếng Pháp 	Albania
82 	Lựa chọn của Sophie 	William Styron 	1979 	tiếng Anh 	Hoa Kỳ
83 	Gypsy Ballads 	Federico García Lorca 	1928 	Tiếng Tây Ban Nha 	Tây Ban Nha
84 	Hành khách bí ẩn 	Georges Simenon 	1931 	Tiếng Pháp 	Bỉ
85 	Notre-Dame-des-Fleurs 	Jean Genet 	1944 	Tiếng Pháp 	Pháp
86 	The Man Without Qualities 	Robert Musil 	1930–1932 	Tiếng Đức 	Áo
87 	Fureur et Mystère 	René Char 	1948 	Tiếng Pháp 	Pháp
88 	Bắt trẻ đồng xanh 	J. D. Salinger 	1951 	tiếng Anh 	Hoa Kỳ
89 	No Orchids For Miss Blandish 	James Hadley Chase 	1939 	tiếng Anh 	Anh Quốc
90 	Blake et Mortimer 	Edgar P. Jacobs 	1950 	Tiếng Pháp 	Bỉ
91 	The Notebooks of Malte Laurids Brigge 	Rainer Maria Rilke 	1910 	Tiếng Đức 	Áo-Hung, Thụy Sĩ
92 	La Modification 	Michel Butor 	1957 	Tiếng Pháp 	Pháp
93 	The Origins of Totalitarianism 	Hannah Arendt 	1951 	tiếng Anh, Tiếng Đức 	Đức, Hoa Kỳ
94 	Nghệ nhân và Margarita 	Mikhail Bulgakov 	1967 	Tiếng Nga 	Liên Xô
95 	The Rosy Crucifixion 	Henry Miller 	1949–1960 	tiếng Anh 	Hoa Kỳ
96 	Giấc ngủ dài 	Raymond Chandler 	1939 	tiếng Anh 	Hoa Kỳ
97 	Amers 	Saint-John Perse 	1957 	Tiếng Pháp 	Pháp
98 	Gaston 	André Franquin 	1957 	Tiếng Pháp 	Bỉ
99 	Under the Volcano 	Malcolm Lowry 	1947 	tiếng Anh 	Anh Quốc
100 	Những đứa con của nửa đêm 	Salman Rushdie 	1981 	tiếng Anh 	Ấn Độ, Anh Quốc";
        $array = explode("\n", $str);
        foreach ($array as $key => $value) {
            $value = explode("\t", $value);
            $this->replaceSpace($value[1]);
        
            Book::create([
                'name' => $this->replaceSpace($value[1]),
                'author' => $this->replaceSpace($value[2]),
                'price' => rand(1,9999),
                'nation' => $this->replaceSpace($value[5]),
                'desc' => '',
                'status' => 1,
            ]);
        }

    }
    public function replaceSpace($str){
        $isSpace = substr($str, -1) === ' ';
        if($isSpace){
            return substr_replace($str,'', -1);
        }
        return $str;
    }
}
