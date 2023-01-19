<?php
$texto = ("Luciano Pavarotti
El rey del Do de Pecho

Aunque esta nota no es la más aguda que pueden dar los tenores en ciertas arias, el cantante de Ópera puede alcanzar hasta el re sobreagudo e incluso notas aún más altas. Pero está claro que esto conlleva un mayor grado de dificultad, ya que son extremadamente difíciles de interpretar con una voz natural sin usar el falsete.

Años después Pavarotti intentó nuevamente desafiarse a sí mismo cantando esta misma obra y en el mismo tempo de la ópera como una vez lo hizo, lamentablemente surgió un problema y no pudo repetirlo, ya que la orquesta se encontraba afinada medio tono más abajo, por lo que el rey del do de pecho no tuvo que llegar a esta nota tan aguda.

Luciano Pavarotti Ventura fue el nombre completo de este gran tenor de ópera italiana, uno de los conatantes contemporáneos más famosos de todos los tiempos. No solo es conocido por sus interpretaciones en la ópera, sino por su participación como uno de los tres tenores junto a Plácido Domingo y José Carreras. También cruzó por la música popular interpretando canciones junto a diversos cantantes; la lista de artistas que cantó junto a Pavarotti es muy extensa desde Bono de U2, Michael Jackson, Elton John, Bryan Adams hasta Ricky Martin y Enrique Iglesias.

El Pavarotti & Friends es un festival que se ha convertido en un gran clásico en el cual se conjuga la lírica con géneros populares como el pop, jazz y rock. Un día se le ocurrió a Pavarotti crear un festival en su tierra natal en el que serían invitados muchos destacados artistas a cantar en dúo con él. El tenor asombró con su primer dúo junto al cantante italiano de rock Zucchero con quien cantó el célebre Miserere. Desde ese momento el gran Luciano Pvarotti empezó a llamar a todos los amigos que tenía a lo largo del mundo para cantar juntos con lo que se situó el famoso Pavarotti & Friends.

Pavarotti también se destacó por su generosidad, trabajando a favor de los refugiados y la Cruz Roja, incluso fue premiado en varias ocasiones.

Pavarotti se ganó su fama mundial por la belleza de su voz en las diversas interpretaciones que nos hicieron vibrar al escucharlas una y otra vez. Él se convirtió en uno de los más grandes tenores contemporáneos y, por supuesto, el mejor pagado de la historia.

Lamentablemente, este hombre de gran talento y corazón murió de cáncer de páncreas el 6 de septiembre del 2007. Todo el mundo quedó inmóvil al saber de su fallecimiento.");

$pasada1 = str_replace("
", "</p><p>", $texto);

$textoHTML = ("<p>" . $pasada1);

echo $texto;
