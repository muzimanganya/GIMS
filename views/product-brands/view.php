
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-param" content="_csrf">
<meta name="csrf-token" content="CBqJAbCJVuFXLFzJg-QmAFUShLNKVoeZV5D6Q4s_EmlfWblE3_k-pgcaGquw0EUxBVS89gNisqkHoZQu03pDLQ==">
    <title>Create Invoice</title>
    <link href="/assets/5e8239d8/css/bootstrap.css?v=1700489678" rel="stylesheet">
<link href="/assets/6a5b57e7/css/activeform.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/e45df2e0/css/select2.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/10604a0f/css/select2-addl.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/10604a0f/css/select2-krajee-bs3.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/8ea152c1/css/kv-widgets.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/b90eb076/css/bootstrap-datepicker3.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/b90eb076/css/datepicker-kv.min.css?v=1700489732" rel="stylesheet">
<link href="/assets/5c87d417/css/font-awesome.min.css?v=1700489678" rel="stylesheet">
<link href="/assets/c21844bf/custom.css?v=1700489678" rel="stylesheet">
<link href="/css/site.css?v=1693305329" rel="stylesheet">
<style>
    .popover {
        word-wrap: break-word;
    }
</style>
<script>var customer_terms = "14";
var product_index = 1;
var income_account = null;
var allow_editing = true;
var new_product_list = [];
window.s2options_3267a624 = {"themeCss":".select2-container--krajee-bs3","sizeCss":"","doReset":true,"doToggle":false,"doOrder":false};
window.select2_56b324c8 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Customer","language":"en-US"};

window.kvDatepicker_715bcd45 = {"autoclose":true,"format":"yyyy-mm-dd","todayHighlight":true,"todayBtn":true,"startDate":null};

window.select2_6635279c = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"","language":"en-US"};

var dynamicform_164ffe3f = {"widgetContainer":"dynamicform_wrapper","widgetBody":".container-items","widgetItem":".item","limit":100,"insertButton":".add-item","deleteButton":".remove-item","insertPosition":"bottom","formId":"dynamic-form","min":1,"fields":[{"id":"invoiceitem-{}-item","name":"InvoiceItem[{}][item]"},{"id":"invoiceitem-{}-income_account","name":"InvoiceItem[{}][income_account]"},{"id":"invoiceitem-{}-quantity","name":"InvoiceItem[{}][quantity]"},{"id":"invoiceitem-{}-price","name":"InvoiceItem[{}][price]"},{"id":"invoiceitem-{}-gross","name":"InvoiceItem[{}][gross]"},{"id":"invoiceitem-{}-tax","name":"InvoiceItem[{}][tax]"}],"template":"<div class=\"row item\">\n                    <!-- // necessary for update action. -->\n                    \n                                                                        <div class=\"col-sm-5\">\n                                <div class=\"form-group highlight-addon field-item_0 required\">\n<label class=\"form-label has-star\" for=\"item_0\">Product or Service</label>\n\n<div class=\"kv-plugin-loading loading-item_0\">&nbsp;</div><select id=\"item_0\" class=\"item-name form-control\" name=\"InvoiceItem[0][item]\" data-is-discount=\"0\" aria-required=\"true\" data-s2-options=\"s2options_3267a624\" data-krajee-select2=\"select2_6635279c\" style=\"width: 100%; height: 1px; visibility: hidden;\">\n<option value=\"\"></option>\n<option value=\"135\">CLUB SANDUICH</option>\n<option value=\"58\">SOYA SAUCE (10)</option>\n<option value=\"342\">BUFFET CRD</option>\n<option value=\"3\">HARPIC (9)</option>\n<option value=\"334\">POIVRE BLANCH (2)</option>\n<option value=\"13\">BON DE SORTIE DE CAISSE (6)</option>\n<option value=\"369\">omo</option>\n<option value=\"94\">VIN BLANC (17)</option>\n<option value=\"150\">OMOLETTE SUR PLAT TOURNE OU NON</option>\n<option value=\"54\">SANDUICH (340)</option>\n<option value=\"380\">enveloppe sac</option>\n<option value=\"170\">FRUIT DESAISON / SEASONALFRUIT</option>\n<option value=\"188\">HAMBURGER (2)</option>\n<option value=\"185\">PORTION FROMAGE</option>\n<option value=\"151\">OMOLETTEFRITE / FRIES OMOLET</option>\n<option value=\"397\">IBIGORI</option>\n<option value=\"60\">SUCRE (25)</option>\n<option value=\"309\">carrotte (23)</option>\n<option value=\"84\">FRUITO PASSION (177)</option>\n<option value=\"314\">CURRY (3)</option>\n<option value=\"171\">TRANCHE DEFRUIT / SLICE IF FRUIT</option>\n<option value=\"158\">SOUPE AUPOULET / CHICKENSOUP</option>\n<option value=\"271\">jex (3)</option>\n<option value=\"66\">TAKE AWAY FOOD (127)</option>\n<option value=\"9\">P HYGENIQUE (40)</option>\n<option value=\"146\">OMELETTE JAMBON FROMAGE / HUM ANDCHEESE OMELET</option>\n<option value=\"196\">FILET DE CAPIFAINMAISON / MOUNTZION CAPTAIN FISH</option>\n<option value=\"126\">SANDUICHVIDE / PLAINSANDUICH</option>\n<option value=\"81\">JACK DANIEL (2)</option>\n<option value=\"145\">OMELETTE NATURE / PLAIN OMELET</option>\n<option value=\"353\">PERCIL</option>\n<option value=\"59\">SPAGUETTI (31)</option>\n<option value=\"398\">torchon</option>\n<option value=\"205\">POMME DE TERRE NATURE/BOILLED POTATOES</option>\n<option value=\"378\">balaie</option>\n<option value=\"92\">LEFFE (27)</option>\n<option value=\"362\">sucre vanille</option>\n<option value=\"350\">chococquik (2)</option>\n<option value=\"98\">STELLA (5)</option>\n<option value=\"65\">MIEL (30)</option>\n<option value=\"189\">MINI BROCHETTE DE SAUCISSE</option>\n<option value=\"374\">air fresh</option>\n<option value=\"40\">MOUTARDE (10)</option>\n<option value=\"76\">PETILLANTE (2)</option>\n<option value=\"90\">RED BULL</option>\n<option value=\"99\">THE NOIR / BLACK TEA</option>\n<option value=\"363\">baking</option>\n<option value=\"86\">HEINEKEN33CL (84)</option>\n<option value=\"148\">OMELETTE OIGNNS  TOMATTE</option>\n<option value=\"130\">SANDUICH AVOCAT</option>\n<option value=\"163\">SALADE DUCHEF / CHIEF SALAD</option>\n<option value=\"377\">raclette</option>\n<option value=\"111\">CAFEAFRICAIN / AFRICANCOFFEE</option>\n<option value=\"161\">SALADE MIXTE / MIXTSALAD</option>\n<option value=\"83\">FANTA EN PLASTIQUE (16)</option>\n<option value=\"28\">CUBE MAGGI (1,287)</option>\n<option value=\"33\">HUILE D'olive (2)</option>\n<option value=\"10\">BCCUISINE (1)</option>\n<option value=\"392\">emballage</option>\n<option value=\"190\">EMMINCE DEPOULET / MENCEDNATURE CHICKEN</option>\n<option value=\"200\">BROCHETTE DE POISSON/FISH KEBAB</option>\n<option value=\"114\">CAFE MOKA</option>\n<option value=\"251\">ananas (65)</option>\n<option value=\"214\">Spaghetti aux legumes</option>\n<option value=\"95\">VINROUGE (17)</option>\n<option value=\"109\">CAFE NOIR / BLACKCOFFEE</option>\n<option value=\"100\">THEGINGEMBRE / GINGERTEA</option>\n<option value=\"370\">omo</option>\n<option value=\"347\">essence</option>\n<option value=\"45\">P ALUMINIUM (16)</option>\n<option value=\"74\">PRIMUS 50CL (11)</option>\n<option value=\"169\">SALADE OEUF A LA RUSSE/EGG RUSSIAN SALAD</option>\n<option value=\"396\">eponge</option>\n<option value=\"70\">AMSTEL50CL (19)</option>\n<option value=\"204\">POMME FRITE/FRENCH FRIES</option>\n<option value=\"127\">SANDUICH AUFROMAGE / CHEESESANDUICH</option>\n<option value=\"113\">CAPPUCHINO (1)</option>\n<option value=\"183\">PORTIONSAMBOUSSA (1)</option>\n<option value=\"336\">GDE AASIETTE</option>\n<option value=\"176\">STEACKNATURE / PLAIN BEEFFILET</option>\n<option value=\"159\">SOUPE AUPOISSON / FISH SOUP</option>\n<option value=\"142\">CROQUE MADAME</option>\n<option value=\"106\">CHAUCOLATCHAUD / HOTCHICOLATE</option>\n<option value=\"72\">AMSTEL BOCK (28)</option>\n<option value=\"357\">THYN</option>\n<option value=\"107\">LAITPASTEURISE / FRECHMILK (1)</option>\n<option value=\"303\">viande hachee (4)</option>\n<option value=\"97\">SMIRNOFF (2)</option>\n<option value=\"276\">sel cuisine (3)</option>\n<option value=\"156\">SOUPE MAISON/MOUNT ZION SOUP</option>\n<option value=\"134\">CROISSANTNATURE / PLAINCROISSANT</option>\n<option value=\"73\">AMSTEL ROYALE (29)</option>\n<option value=\"157\">SOUPELEGUMES / VEGETABLES SOUP</option>\n<option value=\"216\">PLAT VEGETARIEN</option>\n<option value=\"355\">epinard (4)</option>\n<option value=\"71\">AMSTEL65CL (10)</option>\n<option value=\"2\">EAU DE JAVEL</option>\n<option value=\"379\">petit essuie-main</option>\n<option value=\"57\">SAUCISSE (15)</option>\n<option value=\"202\">FILET DE CAPITAINE POILE OU GRILLE/FILET FISH POILE OR GRILLED</option>\n<option value=\"75\">PRIMUS 72CL (10)</option>\n<option value=\"7\">HAND WASH (7)</option>\n<option value=\"27\">CROISSANT NATURE (112)</option>\n<option value=\"340\">farine de manioc (6)</option>\n<option value=\"80\">CHIVAS REGAL (40)</option>\n<option value=\"79\">BAVARIA (8)</option>\n<option value=\"124\">JUS COCKTAILGINGEMBRE / COCKTAILS JUIICE WITHGINGER</option>\n<option value=\"101\">THE RUSSE / RUSSIANTEA</option>\n<option value=\"206\">EPINARD NATURE/BOILLED SPINACH</option>\n<option value=\"122\">JUS D'ANANASGINGEMBRE / PEANAPPLE JUICE WITHGINGER</option>\n<option value=\"296\">TOMATE NATURE (18)</option>\n<option value=\"329\">MANGUE (2)</option>\n<option value=\"372\">detol</option>\n<option value=\"149\">OMELETTEE SPAGNOL / SPANICH OMOLET</option>\n<option value=\"78\">BLACK LABEL (5)</option>\n<option value=\"173\">CREPENATURE / PLAIN CREP</option>\n<option value=\"108\">THE DAWA / DAWATEA</option>\n<option value=\"213\">Spaghetti tomatte</option>\n<option value=\"306\">petite banane mure (14)</option>\n<option value=\"110\">CAFE AULAIT / COFFEE WITHMILK</option>\n<option value=\"184\">PORTION BOULETTE</option>\n<option value=\"18\">RECU (2)</option>\n<option value=\"305\">papaye (3)</option>\n<option value=\"102\">THEAFRICAIN / AFRICANTEA</option>\n<option value=\"41\">MUKEKE (84)</option>\n<option value=\"180\">BROCHETTE DEBOEUF / BEEF KEBAB</option>\n<option value=\"164\">SALADE AUPOULET / CHICKENSALAD</option>\n<option value=\"174\">CREPE AUCHAOCOLAT / CHOCOLAT CREP</option>\n<option value=\"12\">BON DE SORTIE (4)</option>\n<option value=\"36\">HUMBOURGER VIANDE</option>\n<option value=\"339\">VERRES</option>\n<option value=\"310\">viande de chevre (12)</option>\n<option value=\"179\">STEACK GRILLE A LAIL / GRILLED BEEFWITH GARLIC</option>\n<option value=\"373\">detol</option>\n<option value=\"327\">HARICOT GRAS (6)</option>\n<option value=\"82\">FANTA (96)</option>\n<option value=\"371\">cake (2)</option>\n<option value=\"93\">EAU MINERAL (96)</option>\n<option value=\"155\">OEUFBOUILLET / SCRAMBLED EGGS</option>\n<option value=\"211\">BANANE FRIT/FRIES BANANA</option>\n<option value=\"208\">RIZ BLANC/WHITE RICE</option>\n<option value=\"25\">MACCARONI</option>\n<option value=\"197\">SANGALAMENNIERE / SANGALAFISH WITH BUTTER (1)</option>\n<option value=\"167\">AVOCATVINAIGRETTE / VINAIGRETTE AVICADO</option>\n<option value=\"195\">EMMINCE DE POULET AU CURRY/MINCED CHICKEN CURRY</option>\n<option value=\"1\">LAVE VITRE (6)</option>\n<option value=\"96\">CARLSBERG (3)</option>\n<option value=\"346\">gazoil</option>\n<option value=\"364\">shatt off</option>\n<option value=\"390\">porte bon de commande (1)</option>\n<option value=\"182\">PORTION SAUCISSE</option>\n<option value=\"356\">epinard</option>\n<option value=\"62\">THE OTB (7)</option>\n<option value=\"85\">GIN GORDEN</option>\n<option value=\"217\">banane verte (110)</option>\n<option value=\"186\">NDAGALA JACKET</option>\n<option value=\"366\">POIRREAU (2)</option>\n<option value=\"275\">POMME DE TERRE (170)</option>\n<option value=\"322\">PAIN GRIS</option>\n<option value=\"387\">CAKE (1)</option>\n<option value=\"137\">DOUBLEHUMBIURGER / DOUBLE BURGER</option>\n<option value=\"337\">PTE CUILLERE</option>\n<option value=\"69\">COTTON (1)</option>\n<option value=\"191\">1 / 4DE POULETR&Ocirc;TIS / ROSTEDCHUCKEN</option>\n<option value=\"264\">avocat (9)</option>\n<option value=\"8\">DESINFECTANT (1)</option>\n<option value=\"129\">SANDUICH DE BOEUF</option>\n<option value=\"119\">JUS MAISON / MOUNTZION JUICE</option>\n<option value=\"133\">SANDUICH OMELETTE / OMELET SANDUICH</option>\n<option value=\"187\">BIG MAC(SPECIAL BURGER) DOUBLE BURGER</option>\n<option value=\"381\">emveloppe par avion</option>\n<option value=\"11\">BON DE COMMANDE (4)</option>\n<option value=\"67\">TAKE AWAY CAFE</option>\n<option value=\"395\">vim</option>\n<option value=\"77\">CREME DE CASIS (2)</option>\n<option value=\"17\">ROULEAU POUR IMPRIMANTE (4)</option>\n<option value=\"87\">SKOL (3)</option>\n<option value=\"144\">OMELETTE MAISON/MOUNT ZION OMELET (3)</option>\n<option value=\"56\">SAUCE MAGGI (42)</option>\n<option value=\"37\">KETCHUP (24)</option>\n<option value=\"38\">LAIT EN POUDRE (24)</option>\n<option value=\"265\">OIGNON BLANCS (12)</option>\n<option value=\"267\">ndagala (18)</option>\n<option value=\"89\">RED LABEL (6)</option>\n<option value=\"193\">1/4 DE POULET GRILLE/CHICKEN GRILLED</option>\n<option value=\"385\">sachet 1 kg</option>\n<option value=\"43\">NEZO (3)</option>\n<option value=\"141\">HOT DOG</option>\n<option value=\"348\">curredent</option>\n<option value=\"274\">citron (30)</option>\n<option value=\"120\">JUSCOCKTAIL / COCKTAILJUICE</option>\n<option value=\"104\">THE CITRONMIEL / LEMIN TEAWITH HONEY</option>\n<option value=\"44\">&OElig;UFS (191)</option>\n<option value=\"284\">AIL (2)</option>\n<option value=\"22\">BOULETTE (10)</option>\n<option value=\"210\">RIZ AU LEGUME/VEGETABLE RICE</option>\n<option value=\"112\">EXPRESSO COFFEE</option>\n<option value=\"46\">P FILM (10)</option>\n<option value=\"212\">Spaghetti bolognaise</option>\n<option value=\"132\">SANDUICHVEGETARIENNE / VEGETABLE SANDUICH</option>\n<option value=\"203\">SANGALA A LA SAUSSE CHAMPIGNON CREME /FISH WITH CREAM MUSHROOM SAUCE</option>\n<option value=\"285\">JINJIMBRE (2)</option>\n<option value=\"131\">SANDUICH AUPOULET / CHICKENSANDUICH</option>\n<option value=\"215\">BUFFET (2)</option>\n<option value=\"160\">SOUPEAMERICAN / AMERICAN SOUP</option>\n<option value=\"21\">BAMBOU (3)</option>\n<option value=\"140\">CROISSANT JAMBO FROMAGE</option>\n<option value=\"31\">FILET DE B&OElig;UF (103)</option>\n<option value=\"39\">MAIZENA (9)</option>\n<option value=\"154\">OEUF BERCY / BERCYEGGS</option>\n<option value=\"297\">POIVRON (12)</option>\n<option value=\"343\">celery (2)</option>\n<option value=\"88\">JPCHENET 25CL (7)</option>\n<option value=\"330\">prune de japon (2)</option>\n<option value=\"389\">emballage (1)</option>\n<option value=\"47\">RIZ CLIENT (57)</option>\n<option value=\"136\">HUMBURGER/HURGER</option>\n<option value=\"178\">MEDAILLON DEBEEF / BEEFSTROGONOFF</option>\n<option value=\"147\">OMELETTES SPECIAL / SPECIAL OMELET</option>\n<option value=\"266\">pasteque (4)</option>\n<option value=\"63\">TOURNESOL (28)</option>\n<option value=\"382\">enveloppe par avion</option>\n<option value=\"192\">BROCHETTE DEPOULET / CHICKENKEBAB</option>\n<option value=\"16\">MAINS COURRANTE (22)</option>\n<option value=\"300\">JAMBO DE PARIS (2)</option>\n<option value=\"209\">RIZ PILAU/PILAU RICE</option>\n<option value=\"26\">CHAMPIGNON (20)</option>\n<option value=\"277\">papier mouchoir (12)</option>\n<option value=\"42\">NATURA (131)</option>\n<option value=\"121\">JUSD'ANANAS / PEANAPPLE JUICE</option>\n<option value=\"118\">EXPRESSON DOUBLE</option>\n<option value=\"198\">SANGALA GRILLE AUCITRON / GRILLEDSANGALA WITHLEMON</option>\n<option value=\"194\">MINCED NATURE CHICKEN/CUISSE DE POULET SAUSSE CHAMPIGNONS (1)</option>\n<option value=\"105\">THE AU LAIT / TEAWITH MILK</option>\n<option value=\"175\">CREPE AU MIEL / CREPWITH HONNEY</option>\n<option value=\"128\">SANDUICH AUJAMBON / HUMSANDUICH</option>\n<option value=\"117\">CAPPUCHINO/ESRESSO FOUETE</option>\n<option value=\"316\">courgette (15)</option>\n<option value=\"388\">emballage</option>\n<option value=\"35\">HUMBOURGER (123)</option>\n<option value=\"32\">HARICOT STAFF (79.50)</option>\n<option value=\"139\">SANDUICH AU THON</option>\n<option value=\"115\">CAFE MACHIATO</option>\n<option value=\"30\">FARINE MAIS (10)</option>\n<option value=\"338\">GDE CUILLERE</option>\n<option value=\"391\">porte bon de commande</option>\n<option value=\"143\">CROQUE MONSIEUR (1)</option>\n<option value=\"283\">LAITUE (42)</option>\n<option value=\"394\">ondulaire</option>\n<option value=\"55\">SAUCE TOMATE (160)</option>\n<option value=\"376\">saliere</option>\n<option value=\"199\">MUKEKEGRILLE / GRILLEDMUKEKE</option>\n<option value=\"23\">CAFE EN GRAINE (12.50)</option>\n<option value=\"328\">PRIME DE JAPON (2)</option>\n<option value=\"168\">TOMATE FARCIE AU THON/TOMATO STUFFED WITH TUNA</option>\n<option value=\"123\">JUSMANGUE / MANGOJUICE</option>\n<option value=\"49\">PAILLE (23)</option>\n<option value=\"332\">AUBERGINE</option>\n<option value=\"64\">THON (13)</option>\n<option value=\"298\">CONCOMBRE (9)</option>\n<option value=\"166\">SALADE OEUF A LARUSSE / EGGSRUSSIAN SALAD</option>\n<option value=\"333\">PILAOU MASARA</option>\n<option value=\"351\">MUSCADE</option>\n<option value=\"311\">FROMAGE (2)</option>\n<option value=\"341\">GATAO (12)</option>\n<option value=\"293\">OIGNON ROUGE (13)</option>\n<option value=\"375\">saliere</option>\n<option value=\"103\">THE VERT/GREEN TEA</option>\n<option value=\"116\">CAFE LATIN</option>\n<option value=\"91\">JB (11)</option>\n<option value=\"153\">OEUF NATURE/EGGS PLAIN</option>\n<option value=\"29\">FARINE AZAM (9)</option>\n<option value=\"152\">OMOLETTES OIGNONS CHAMPIGNONS/MOUSHROOM ONION OMOLLET</option>\n<option value=\"4\">SERVIETTES (165)</option>\n<option value=\"162\">SALADEVEGETARIENNE / VEGETABLE SALAD</option>\n<option value=\"14\">BON D'ENTREE (8)</option>\n<option value=\"34\">HUILE DE CUISINE (140)</option>\n<option value=\"383\">vinaigre (2)</option>\n<option value=\"207\">EPINARD A LA CREME/SPINACH IN A CREAMY</option>\n<option value=\"386\">serviettes en tissus</option>\n<option value=\"53\">SANGALA (150)</option>\n<option value=\"335\">PTE ASSIETTE</option>\n<option value=\"48\">RIZ PERSONNEL (86)</option>\n<option value=\"19\">DEMANDE D'ACHATS (9)</option>\n<option value=\"181\">BROCHETTECHEVRE / GOAT KEBAB (1)</option>\n<option value=\"24\">CREME FRESH (18)</option>\n<option value=\"365\">tuyaux flexible</option>\n<option value=\"138\">HUMBOURGER AUPOULET / CHICKENBURGER</option>\n<option value=\"201\">MUKEKE DESOSSE GRILLE AU CITRON</option>\n<option value=\"52\">SAMBOUSSA (885)</option>\n<option value=\"125\">JUS D'ANANA MANGUE</option>\n<option value=\"393\">pile crayon</option>\n<option value=\"5\">SAVON LIQUIDE (38)</option>\n<option value=\"61\">THE VERT (1)</option>\n<option value=\"384\">vinaigre</option>\n<option value=\"20\">1/4 POULET (122)</option>\n<option value=\"68\">SACHET POUBEL (10)</option>\n<option value=\"15\">FACTURIER (10)</option>\n<option value=\"172\">SALADE DEFRUIT / FRUIT SALAD</option>\n<option value=\"291\">POIVRE NOIR (8)</option>\n<option value=\"165\">SALADNICOISE / CREAMYAVICADO GUNASALAD</option>\n<option value=\"51\">PRESTIGE (21)</option>\n<option value=\"50\">PILIPILI (77)</option>\n<option value=\"177\">BEEF AUCHAMPIGNION / BEEFFILET WITHMUSHROOM</option>\n<option value=\"6\">P MOUCHOIR (9)</option>\n</select>\n\n<div class=\"help-block help-block-error\"></div>\n\n</div>                            </div>\n\n                        \n                                                    <div class=\"col-sm-3\">\n                                <div class=\"form-group highlight-addon field-invoiceitem-0-quantity required\">\n<label class=\"form-label has-star\" for=\"invoiceitem-0-quantity\">Quantity</label>\n\n<input type=\"text\" id=\"invoiceitem-0-quantity\" class=\"quantity form-control\" name=\"InvoiceItem[0][quantity]\" aria-required=\"true\">\n\n<div class=\"help-block help-block-error\"></div>\n\n</div>                            </div>\n                        \n                    \n                                            <div class=\"col-sm-3\">\n                            <div class=\"form-group highlight-addon field-invoiceitem-0-price required\">\n<label class=\"form-label has-star\" for=\"invoiceitem-0-price\">Price</label>\n\n<input type=\"text\" id=\"invoiceitem-0-price\" class=\"unit-price form-control inv-editable\" name=\"InvoiceItem[0][price]\" aria-required=\"true\">\n\n<div class=\"help-block help-block-error\"></div>\n\n</div>                        </div>\n                    \n                                            <div class=\"highlight-addon field-invoiceitem-0-tax_id\">\n<input type=\"hidden\" id=\"invoiceitem-0-tax_id\" class=\"tax-rate form-control inv-editable\" name=\"InvoiceItem[0][tax_id]\" data-tax-rate=\"\">\n</div>                    \n                    \n                    <div class=\"col-sm-1\">\n                        <div style=\"margin-top:24px;\">\n                            <button class=\"btn btn-primary btn-xs add-item\"><i class=\"fa fa-plus-circle\"></i></button>\n                            <button class=\"btn btn-danger btn-xs remove-item\"><i class=\"fa fa-trash\"></i></button>\n                        </div>\n                    </div>\n                </div>"};

window.numberControl_e6a11314 = {"displayId":"productservice-purchase_price-disp","maskedInputOptions":{"alias":"numeric","digits":2,"groupSeparator":",","radixPoint":".","autoGroup":true,"autoUnmask":false,"allowMinus":false,"rightAlign":false}};

window.select2_5c9282ba = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Purchase Tax","language":"en-US"};

window.numberControl_f7a15d1f = {"displayId":"productservice-sales_price-disp","maskedInputOptions":{"alias":"numeric","digits":2,"groupSeparator":",","radixPoint":".","autoGroup":true,"autoUnmask":false,"allowMinus":false,"rightAlign":false}};

window.select2_22bf22f0 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Sales Tax","language":"en-US"};

window.select2_35e9c953 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Purchase Account","language":"en-US"};

window.select2_3f3285f1 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Sales Account","language":"en-US"};

window.select2_2d4f8a11 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Sales Discount Account","language":"en-US"};

window.select2_110b6d12 = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Category","language":"en-US"};

window.select2_7968fcdd = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"Select Brand","language":"en-US"};

window.select2_4453842b = {"allowClear":true,"theme":"krajee-bs3","width":"100%","placeholder":"How is it Measured?","language":"en-US"};

window.numberControl_977398bc = {"displayId":"productservice-reorder_level-disp","maskedInputOptions":{"alias":"numeric","digits":2,"groupSeparator":",","radixPoint":".","autoGroup":true,"autoUnmask":false,"allowMinus":false,"rightAlign":false}};
</script>    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        .site_title {
            height: 80px;
        }

        table.jambo_table th a {
            color: white;
        }

        /*Loading*/
        .lds-facebook {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-facebook div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #C62828;
            animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }

        .lds-facebook div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }

        .lds-facebook div:nth-child(2) {
            left: 32px;
            animation-delay: -0.12s;
        }

        .lds-facebook div:nth-child(3) {
            left: 56px;
            animation-delay: 0;
        }

        @keyframes lds-facebook {
            0% {
                top: 8px;
                height: 64px;
            }

            50%,
            100% {
                top: 24px;
                height: 32px;
            }
        }

        span.h5 {
            display: table;
            /* Enable line-wrapping in IE8+ */
            white-space: normal;
            /* Enable line-wrapping in old versions of some other browsers */
        }
    </style>
</head>

<body class="nav-md">
        <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                                                                            <div class='site_title' style="overflow: visible; ">
                                <a href='/' style='color:white;'>
                                                                            <div class="media">
                                            <span class="media-left">
                                                <img style="height: 60px; width:60px;border-radius: 50%;" src='/uploads/logo/ed9a948b053734b6100f298f6af092b0de40a4400ee033743140e2ad7223d690.png' />
                                            </span>
                                            <div class="media-body">
                                                <h5 class="media-heading"><br>
                                                    <span style="overflow-wrap:anywhere;">MT ZION AEROPORT</span>
                                                </h5>
                                            </div>
                                        </div>

                                                                    </a>
                            </div>
                                            </div>
                    <div class="clearfix"></div>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <hr style="opacity: 0.1; background:lightslategray;">
                            <ul class="nav side-menu"><li><a href="/index.php/home/index"><i class="fa fa-home"></i><span>Home</span></a></li>
<li class="active"><a href="javascript:;"><i class="fa fa-file-text"></i><span>Invoices</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li class="active"><a href="/index.php/accounting/invoices/create"><span>New Invoice</span></a></li>
<li><a href="/index.php/menu/invoices"><span>Invoice Reports</span></a></li>
<li><a href="/index.php/accounting/credit-notes/index"><span>Credit Notes</span></a></li>
<li><a href="/index.php/accounting/general-reports/product-sales"><span>Invoice Product Sales</span></a></li>
<li><a href="/index.php/accounting/general-reports/aging-receivables"><span>Ageing Invoices</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-shopping-bag"></i><span>Expenses</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/accounting/bills/create"><span>New Bill</span></a></li>
<li><a href="/index.php/menu/expenses"><span>Expenses Reports</span></a></li>
<li><a href="/index.php/accounting/petty-cash-vouchers/index"><span>Cash Vouchers</span></a></li>
<li><a href="/index.php/accounting/general-reports/product-costs"><span>Product Costs</span></a></li>
<li><a href="/index.php/accounting/general-reports/aging-payables"><span>Ageing Bills</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-calculator"></i><span>Budgeting</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/budgeting/budgets/index"><span>Daily Budgets</span></a></li>
<li><a href="/index.php/budgeting/budget-lines/index"><span>Budget Items</span></a></li>
<li><a href="/index.php/budgeting/budget-lines/my-budget"><span>My Budget</span></a></li>
<li><a href="/index.php/menu/budget-reports"><span>Budget Reports</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-shopping-cart"></i><span>Point of Sale</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/inventory/default/index"><span>POS Dashboard</span></a></li>
<li><a href="/index.php/inventory/inventory-sales/create"><span>New Sale</span></a></li>
<li><a href="/index.php/menu/inventory-reports"><span>POS Reports</span></a></li>
<li><a href="/index.php/inventory/default/close-day"><span>Close Daily Books</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-archive"></i><span>Purchase Orders</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/inventory/purchase-orders/create"><span>New Order</span></a></li>
<li><a href="/index.php/inventory/purchase-orders/index"><span>All Orders</span></a></li>
<li><a href="/index.php/inventory/purchase-orders/analysis"><span>Purchase Analysis</span></a></li>
<li><a href="/index.php/inventory/received-orders/index"><span>Received Orders</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-building-o"></i><span>Store &amp; Stock</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/inventory/default/stock-balance"><span>Stock balance</span></a></li>
<li><a href="/index.php/inventory/default/stock-movement"><span>Stock Movement</span></a></li>
<li><a href="/index.php/inventory/default/expiring-items"><span>Expiring Items</span></a></li>
<li><a href="/index.php/inventory/inventory-stores/move-stock"><span>Move Store Stock</span></a></li>
<li><a href="/index.php/inventory/stock-adjustments/index"><span>Issue Stock</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-coffee"></i><span>Restaurant</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/resto/resto-orders/index"><span>All Orders</span></a></li>
<li><a href="/index.php/resto/resto-orders/create"><span>New Order</span></a></li>
<li><a href="/index.php/resto/resto-orders/close-books"><span>Close Daily Books</span></a></li>
<li><a href="/index.php/menu/resto-reports"><span>Restaurant Reports</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-cutlery"></i><span>Kitchen &amp; Stock</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/resto/stock-issued/index"><span>Kitchen Stock Requests</span></a></li>
<li><a href="/index.php/resto/stock-adjustments/index"><span>Kitchen Stock Adjustment</span></a></li>
<li><a href="/index.php/resto/stock-issued/requests"><span>Chef Stock Requests</span></a></li>
<li><a href="/index.php/resto/default/stock-movement"><span>Kitchen Stock Movement</span></a></li>
<li><a href="/index.php/resto/default/stock-balance"><span>Kitchen Stock Balance</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-users"></i><span>HR &amp; Payroll</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/payroll/allowances/index"><span>Staff Allowances</span></a></li>
<li><a href="/index.php/menu/payroll-reports"><span>Reports</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-bank"></i><span>Banking</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/accounting/banks"><span>Bank Accounts</span></a></li>
<li><a href="/index.php/accounting/banks/create"><span>New Account</span></a></li>
<li><a href="/index.php/accounting/banks/transfer"><span>Money Transfer</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-list-alt"></i><span>Accounting</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/accounting/reports/trial-balance"><span>Trial Balance</span></a></li>
<li><a href="/index.php/accounting/business-loans/index"><span>Business Loans</span></a></li>
<li><a href="/index.php/accounting/journals"><span>Manual Journals</span></a></li>
<li><a href="/index.php/accounting/fixed-assets/index"><span>Fixed Assets Register</span></a></li>
<li><a href="/index.php/accounting/chart-of-accounts"><span>Chart of Accounts</span></a></li>
<li><a href="/index.php/menu/accounting-reports"><span>Reports</span></a></li>
</ul>
</li>
<li><a href="javascript:;"><i class="fa fa-bell-o"></i><span>Notifications</span><span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="/index.php/notifications/sms/index"><span>All SMS</span></a></li>
<li><a href="/index.php/notifications/sms/notify-parents"><span>Notify Parents</span></a></li>
<li><a href="/index.php/notifications/sms/notify-payments"><span>Notify Payments</span></a></li>
<li><a href="/index.php/notifications/sms/notify-exams"><span>Notify Exams</span></a></li>
<li><a href="/index.php/notifications/sms-templates/index"><span>SMS Templates</span></a></li>
</ul>
</li>
<li><a href="/index.php/menu/business-setup"><i class="fa fa-cog"></i><span>Business Setup</span></a></li></ul>                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <br><br>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <!-- Right Navbar Items -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Habimana Desire (BIF)
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="/index.php/home/my-biz?id=452">Business Profile</a></li>
                                    <li><a href="/index.php/home/my-profile">User Profile</a></li>
                                    <li><a href="/index.php/home/billing">Billing & Payments</a></li>
                                    <li><a href="/index.php/home/register-business">New Business</a></li>
                                    <li><a href="/index.php/home/switch-business">Switch Business</a></li>
                                    <li><a href="/index.php/home/language">Change Language</a></li>
                                    <li><a href="/index.php/home/logout" data-method="post">Log Out</a></li>
                                </ul>
                            </li>


                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                                                    </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="overflow:auto; max-height:500px;">
                                                                                                        </ul>
                            </li>
                        </ul>
                        <!-- /Right Navbar Items -->
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <ul class="breadcrumb"><li><a href="/index.php">Home</a></li>
<li><a href="/index.php/accounting/invoices/index">Invoices</a></li>
<li class="active">Create Invoice</li>
</ul>                                
                
                <div>
                    <div class="lds-facebook" id="progress" style="display: none; left:45%;">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="invoice-create">

    <form id="dynamic-form" class="form-vertical kv-form-bs3" action="/index.php/accounting/invoices/create" method="post" autocomplete="off">
<input type="hidden" name="_csrf" value="CBqJAbCJVuFXLFzJg-QmAFUShLNKVoeZV5D6Q4s_EmlfWblE3_k-pgcaGquw0EUxBVS89gNisqkHoZQu03pDLQ==">
<div class="row">
    <div class="col-md-6">
        <h3 id="business_name"></h3>
        <p id="address"></p>
        <p><span id="mobile"></span> <br> <span id="website"></span></p>
        <p><strong>ATT:  <span id="contact_name"></span></strong></p>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-8">
                <label style="cursor: pointer;" class="form-label has-star" for="customer" data-toggle='modal' data-target='#modal-new-customer'>
                    New Customer                    <i class="fa fa-plus-circle"></i>
                </label>

                <div class="form-group highlight-addon field-customer required">


<div class="kv-plugin-loading loading-customer">&nbsp;</div><select id="customer" class="form-control" name="Invoice[customer]" aria-required="true" data-s2-options="s2options_3267a624" data-krajee-select2="select2_56b324c8" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Customer</option>
<option value="1">TEST</option>
<option value="2">comm adj</option>
<option value="4">KQ</option>
<option value="5">ETH</option>
<option value="8">KQ CASH</option>
<option value="9">ETH CASH</option>
<option value="10">BRUSSELS CASH</option>
<option value="6">TANZ</option>
<option value="11">TANZ CASH</option>
<option value="12">UG</option>
<option value="13">UG CASH</option>
<option value="14">RWANDAIR</option>
<option value="15">RWANDAIR CASH</option>
<option value="16">Ouganda Airlines</option>
<option value="17">Ouganda Airlines</option>
<option value="18">Ethiopian Airlines</option>
<option value="7">BL BRUSSELS</option>
<option value="19">etienne safe guard</option>
<option value="20">AACB</option>
<option value="21">PATRONNE</option>
<option value="22">PNB</option>
<option value="23">biko</option>
<option value="24">AIR TANZANIE</option>
<option value="25">RWANDAIR</option>
<option value="26">BIKO</option>
<option value="27">KQ VIP</option>
<option value="28">KQ VIP</option>
<option value="29">ETH VIP</option>
<option value="30">Rwandair vip</option>
<option value="31">Rwandair vip</option>
<option value="32">rwandair vip</option>
<option value="33">Brussels VIP</option>
<option value="34">Ugandair VIP</option>
<option value="35">Ugandair VIP</option>
<option value="36">Ugandair VIP</option>
<option value="37">Ugandair VIP</option>
<option value="38">Tanzanie VIP</option>
<option value="39">ETH VIP</option>
<option value="40">UGANDA AIRLINES</option>
<option value="41">Lumicash</option>
<option value="42">Lumicash</option>
<option value="43">Dieudonne AACB</option>
<option value="44">Dieudonne AACB</option>
<option value="45">LUMICASH</option>
<option value="46">LUMICASH</option>
</select>

<div class="help-block help-block-error"></div>

</div>            </div>

            <div class="col-md-4">
                <div class="form-group highlight-addon field-tax-calculations required">
<label class="form-label has-star" for="tax-calculations">Price Calculation</label>

<select id="tax-calculations" class="form-control" name="Invoice[is_tax_exclusive]" aria-required="true">
<option value="1" selected>Tax Exclusive</option>
<option value="0">Tax Inclusive</option>
</select>

<div class="help-block help-block-error"></div>

</div>            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group highlight-addon field-invoice-date required">
<label class="form-label has-star" for="invoice-date">Invoice Date</label>

<div id="invoice-date-kvdate" class="input-group date"><input type="text" id="invoice-date" class="form-control krajee-datepicker" name="Invoice[invoice_date]" value="2023-11-29" aria-required="true" data-datepicker-source="invoice-date-kvdate" data-datepicker-type="3" data-krajee-kvDatepicker="kvDatepicker_715bcd45"><span class="input-group-addon kv-date-remove" title="Clear field"><i class="fa fa-close text-danger"></i></span><span class="input-group-addon kv-date-picker" title="Select date"><i class="fa fa-calendar-check-o text-primary"></i></span></div>

<div class="help-block help-block-error"></div>

</div>            </div>
            <div class="col-md-6">
                <div class="form-group highlight-addon field-due_date required">
<label class="form-label has-star" for="due_date">Due Date</label>

<div id="due_date-kvdate" class="input-group date"><input type="text" id="due_date" class="form-control krajee-datepicker" name="Invoice[due_date]" aria-required="true" data-datepicker-source="due_date-kvdate" data-datepicker-type="3" data-krajee-kvDatepicker="kvDatepicker_715bcd45"><span class="input-group-addon kv-date-remove" title="Clear field"><i class="fa fa-close text-danger"></i></span><span class="input-group-addon kv-date-picker" title="Select date"><i class="fa fa-calendar-check-o text-primary"></i></span></div>

<div class="help-block help-block-error"></div>

</div>            </div>
        </div>

                    <div class="form-group highlight-addon field-invoice-reference">
<label class="form-label has-star" for="invoice-reference">LPO/Reference</label>

<input type="text" id="invoice-reference" class="form-control" name="Invoice[reference]" maxlength="200" placeholder="Optional">

<div class="help-block help-block-error"></div>

</div>        
        
                    
                    
        
        <!-- Delivery Note -->
            </div>
</div><br>


<div class="panel panel-default">
    <div class="panel-body">
        <label style="cursor: pointer;" class="form-label has-star" for="product" data-toggle='modal' data-target='#modal-new-product'>
            New Product/Service            <i class="fa fa-plus-circle"></i>
        </label>
        <hr style="margin:5px 0 5px 0;">

        <div class="dynamicform_wrapper" data-dynamicform="dynamicform_164ffe3f">
        <div class="container-items">
            <!-- widgetContainer -->
                            <!-- widgetBody -->
                <div class="row item">
                    <!-- // necessary for update action. -->
                    
                                                                        <div class="col-sm-5">
                                <div class="form-group highlight-addon field-item_0 required">
<label class="form-label has-star" for="item_0">Product or Service</label>

<div class="kv-plugin-loading loading-item_0">&nbsp;</div><select id="item_0" class="item-name form-control" name="InvoiceItem[0][item]" data-is-discount="0" aria-required="true" data-s2-options="s2options_3267a624" data-krajee-select2="select2_6635279c" style="width: 100%; height: 1px; visibility: hidden;">
<option value=""></option>
<option value="135">CLUB SANDUICH</option>
<option value="58">SOYA SAUCE (10)</option>
<option value="342">BUFFET CRD</option>
<option value="3">HARPIC (9)</option>
<option value="334">POIVRE BLANCH (2)</option>
<option value="13">BON DE SORTIE DE CAISSE (6)</option>
<option value="369">omo</option>
<option value="94">VIN BLANC (17)</option>
<option value="150">OMOLETTE SUR PLAT TOURNE OU NON</option>
<option value="54">SANDUICH (340)</option>
<option value="380">enveloppe sac</option>
<option value="170">FRUIT DESAISON / SEASONALFRUIT</option>
<option value="188">HAMBURGER (2)</option>
<option value="185">PORTION FROMAGE</option>
<option value="151">OMOLETTEFRITE / FRIES OMOLET</option>
<option value="397">IBIGORI</option>
<option value="60">SUCRE (25)</option>
<option value="309">carrotte (23)</option>
<option value="84">FRUITO PASSION (177)</option>
<option value="314">CURRY (3)</option>
<option value="171">TRANCHE DEFRUIT / SLICE IF FRUIT</option>
<option value="158">SOUPE AUPOULET / CHICKENSOUP</option>
<option value="271">jex (3)</option>
<option value="66">TAKE AWAY FOOD (127)</option>
<option value="9">P HYGENIQUE (40)</option>
<option value="146">OMELETTE JAMBON FROMAGE / HUM ANDCHEESE OMELET</option>
<option value="196">FILET DE CAPIFAINMAISON / MOUNTZION CAPTAIN FISH</option>
<option value="126">SANDUICHVIDE / PLAINSANDUICH</option>
<option value="81">JACK DANIEL (2)</option>
<option value="145">OMELETTE NATURE / PLAIN OMELET</option>
<option value="353">PERCIL</option>
<option value="59">SPAGUETTI (31)</option>
<option value="398">torchon</option>
<option value="205">POMME DE TERRE NATURE/BOILLED POTATOES</option>
<option value="378">balaie</option>
<option value="92">LEFFE (27)</option>
<option value="362">sucre vanille</option>
<option value="350">chococquik (2)</option>
<option value="98">STELLA (5)</option>
<option value="65">MIEL (30)</option>
<option value="189">MINI BROCHETTE DE SAUCISSE</option>
<option value="374">air fresh</option>
<option value="40">MOUTARDE (10)</option>
<option value="76">PETILLANTE (2)</option>
<option value="90">RED BULL</option>
<option value="99">THE NOIR / BLACK TEA</option>
<option value="363">baking</option>
<option value="86">HEINEKEN33CL (84)</option>
<option value="148">OMELETTE OIGNNS  TOMATTE</option>
<option value="130">SANDUICH AVOCAT</option>
<option value="163">SALADE DUCHEF / CHIEF SALAD</option>
<option value="377">raclette</option>
<option value="111">CAFEAFRICAIN / AFRICANCOFFEE</option>
<option value="161">SALADE MIXTE / MIXTSALAD</option>
<option value="83">FANTA EN PLASTIQUE (16)</option>
<option value="28">CUBE MAGGI (1,287)</option>
<option value="33">HUILE D&#039;olive (2)</option>
<option value="10">BCCUISINE (1)</option>
<option value="392">emballage</option>
<option value="190">EMMINCE DEPOULET / MENCEDNATURE CHICKEN</option>
<option value="200">BROCHETTE DE POISSON/FISH KEBAB</option>
<option value="114">CAFE MOKA</option>
<option value="251">ananas (65)</option>
<option value="214">Spaghetti aux legumes</option>
<option value="95">VINROUGE (17)</option>
<option value="109">CAFE NOIR / BLACKCOFFEE</option>
<option value="100">THEGINGEMBRE / GINGERTEA</option>
<option value="370">omo</option>
<option value="347">essence</option>
<option value="45">P ALUMINIUM (16)</option>
<option value="74">PRIMUS 50CL (11)</option>
<option value="169">SALADE OEUF A LA RUSSE/EGG RUSSIAN SALAD</option>
<option value="396">eponge</option>
<option value="70">AMSTEL50CL (19)</option>
<option value="204">POMME FRITE/FRENCH FRIES</option>
<option value="127">SANDUICH AUFROMAGE / CHEESESANDUICH</option>
<option value="113">CAPPUCHINO (1)</option>
<option value="183">PORTIONSAMBOUSSA (1)</option>
<option value="336">GDE AASIETTE</option>
<option value="176">STEACKNATURE / PLAIN BEEFFILET</option>
<option value="159">SOUPE AUPOISSON / FISH SOUP</option>
<option value="142">CROQUE MADAME</option>
<option value="106">CHAUCOLATCHAUD / HOTCHICOLATE</option>
<option value="72">AMSTEL BOCK (28)</option>
<option value="357">THYN</option>
<option value="107">LAITPASTEURISE / FRECHMILK (1)</option>
<option value="303">viande hachee (4)</option>
<option value="97">SMIRNOFF (2)</option>
<option value="276">sel cuisine (3)</option>
<option value="156">SOUPE MAISON/MOUNT ZION SOUP</option>
<option value="134">CROISSANTNATURE / PLAINCROISSANT</option>
<option value="73">AMSTEL ROYALE (29)</option>
<option value="157">SOUPELEGUMES / VEGETABLES SOUP</option>
<option value="216">PLAT VEGETARIEN</option>
<option value="355">epinard (4)</option>
<option value="71">AMSTEL65CL (10)</option>
<option value="2">EAU DE JAVEL</option>
<option value="379">petit essuie-main</option>
<option value="57">SAUCISSE (15)</option>
<option value="202">FILET DE CAPITAINE POILE OU GRILLE/FILET FISH POILE OR GRILLED</option>
<option value="75">PRIMUS 72CL (10)</option>
<option value="7">HAND WASH (7)</option>
<option value="27">CROISSANT NATURE (112)</option>
<option value="340">farine de manioc (6)</option>
<option value="80">CHIVAS REGAL (40)</option>
<option value="79">BAVARIA (8)</option>
<option value="124">JUS COCKTAILGINGEMBRE / COCKTAILS JUIICE WITHGINGER</option>
<option value="101">THE RUSSE / RUSSIANTEA</option>
<option value="206">EPINARD NATURE/BOILLED SPINACH</option>
<option value="122">JUS D&#039;ANANASGINGEMBRE / PEANAPPLE JUICE WITHGINGER</option>
<option value="296">TOMATE NATURE (18)</option>
<option value="329">MANGUE (2)</option>
<option value="372">detol</option>
<option value="149">OMELETTEE SPAGNOL / SPANICH OMOLET</option>
<option value="78">BLACK LABEL (5)</option>
<option value="173">CREPENATURE / PLAIN CREP</option>
<option value="108">THE DAWA / DAWATEA</option>
<option value="213">Spaghetti tomatte</option>
<option value="306">petite banane mure (14)</option>
<option value="110">CAFE AULAIT / COFFEE WITHMILK</option>
<option value="184">PORTION BOULETTE</option>
<option value="18">RECU (2)</option>
<option value="305">papaye (3)</option>
<option value="102">THEAFRICAIN / AFRICANTEA</option>
<option value="41">MUKEKE (84)</option>
<option value="180">BROCHETTE DEBOEUF / BEEF KEBAB</option>
<option value="164">SALADE AUPOULET / CHICKENSALAD</option>
<option value="174">CREPE AUCHAOCOLAT / CHOCOLAT CREP</option>
<option value="12">BON DE SORTIE (4)</option>
<option value="36">HUMBOURGER VIANDE</option>
<option value="339">VERRES</option>
<option value="310">viande de chevre (12)</option>
<option value="179">STEACK GRILLE A LAIL / GRILLED BEEFWITH GARLIC</option>
<option value="373">detol</option>
<option value="327">HARICOT GRAS (6)</option>
<option value="82">FANTA (96)</option>
<option value="371">cake (2)</option>
<option value="93">EAU MINERAL (96)</option>
<option value="155">OEUFBOUILLET / SCRAMBLED EGGS</option>
<option value="211">BANANE FRIT/FRIES BANANA</option>
<option value="208">RIZ BLANC/WHITE RICE</option>
<option value="25">MACCARONI</option>
<option value="197">SANGALAMENNIERE / SANGALAFISH WITH BUTTER (1)</option>
<option value="167">AVOCATVINAIGRETTE / VINAIGRETTE AVICADO</option>
<option value="195">EMMINCE DE POULET AU CURRY/MINCED CHICKEN CURRY</option>
<option value="1">LAVE VITRE (6)</option>
<option value="96">CARLSBERG (3)</option>
<option value="346">gazoil</option>
<option value="364">shatt off</option>
<option value="390">porte bon de commande (1)</option>
<option value="182">PORTION SAUCISSE</option>
<option value="356">epinard</option>
<option value="62">THE OTB (7)</option>
<option value="85">GIN GORDEN</option>
<option value="217">banane verte (110)</option>
<option value="186">NDAGALA JACKET</option>
<option value="366">POIRREAU (2)</option>
<option value="275">POMME DE TERRE (170)</option>
<option value="322">PAIN GRIS</option>
<option value="387">CAKE (1)</option>
<option value="137">DOUBLEHUMBIURGER / DOUBLE BURGER</option>
<option value="337">PTE CUILLERE</option>
<option value="69">COTTON (1)</option>
<option value="191">1 / 4DE POULETRÔTIS / ROSTEDCHUCKEN</option>
<option value="264">avocat (9)</option>
<option value="8">DESINFECTANT (1)</option>
<option value="129">SANDUICH DE BOEUF</option>
<option value="119">JUS MAISON / MOUNTZION JUICE</option>
<option value="133">SANDUICH OMELETTE / OMELET SANDUICH</option>
<option value="187">BIG MAC(SPECIAL BURGER) DOUBLE BURGER</option>
<option value="381">emveloppe par avion</option>
<option value="11">BON DE COMMANDE (4)</option>
<option value="67">TAKE AWAY CAFE</option>
<option value="395">vim</option>
<option value="77">CREME DE CASIS (2)</option>
<option value="17">ROULEAU POUR IMPRIMANTE (4)</option>
<option value="87">SKOL (3)</option>
<option value="144">OMELETTE MAISON/MOUNT ZION OMELET (3)</option>
<option value="56">SAUCE MAGGI (42)</option>
<option value="37">KETCHUP (24)</option>
<option value="38">LAIT EN POUDRE (24)</option>
<option value="265">OIGNON BLANCS (12)</option>
<option value="267">ndagala (18)</option>
<option value="89">RED LABEL (6)</option>
<option value="193">1/4 DE POULET GRILLE/CHICKEN GRILLED</option>
<option value="385">sachet 1 kg</option>
<option value="43">NEZO (3)</option>
<option value="141">HOT DOG</option>
<option value="348">curredent</option>
<option value="274">citron (30)</option>
<option value="120">JUSCOCKTAIL / COCKTAILJUICE</option>
<option value="104">THE CITRONMIEL / LEMIN TEAWITH HONEY</option>
<option value="44">ŒUFS (191)</option>
<option value="284">AIL (2)</option>
<option value="22">BOULETTE (10)</option>
<option value="210">RIZ AU LEGUME/VEGETABLE RICE</option>
<option value="112">EXPRESSO COFFEE</option>
<option value="46">P FILM (10)</option>
<option value="212">Spaghetti bolognaise</option>
<option value="132">SANDUICHVEGETARIENNE / VEGETABLE SANDUICH</option>
<option value="203">SANGALA A LA SAUSSE CHAMPIGNON CREME /FISH WITH CREAM MUSHROOM SAUCE</option>
<option value="285">JINJIMBRE (2)</option>
<option value="131">SANDUICH AUPOULET / CHICKENSANDUICH</option>
<option value="215">BUFFET (2)</option>
<option value="160">SOUPEAMERICAN / AMERICAN SOUP</option>
<option value="21">BAMBOU (3)</option>
<option value="140">CROISSANT JAMBO FROMAGE</option>
<option value="31">FILET DE BŒUF (103)</option>
<option value="39">MAIZENA (9)</option>
<option value="154">OEUF BERCY / BERCYEGGS</option>
<option value="297">POIVRON (12)</option>
<option value="343">celery (2)</option>
<option value="88">JPCHENET 25CL (7)</option>
<option value="330">prune de japon (2)</option>
<option value="389">emballage (1)</option>
<option value="47">RIZ CLIENT (57)</option>
<option value="136">HUMBURGER/HURGER</option>
<option value="178">MEDAILLON DEBEEF / BEEFSTROGONOFF</option>
<option value="147">OMELETTES SPECIAL / SPECIAL OMELET</option>
<option value="266">pasteque (4)</option>
<option value="63">TOURNESOL (28)</option>
<option value="382">enveloppe par avion</option>
<option value="192">BROCHETTE DEPOULET / CHICKENKEBAB</option>
<option value="16">MAINS COURRANTE (22)</option>
<option value="300">JAMBO DE PARIS (2)</option>
<option value="209">RIZ PILAU/PILAU RICE</option>
<option value="26">CHAMPIGNON (20)</option>
<option value="277">papier mouchoir (12)</option>
<option value="42">NATURA (131)</option>
<option value="121">JUSD&#039;ANANAS / PEANAPPLE JUICE</option>
<option value="118">EXPRESSON DOUBLE</option>
<option value="198">SANGALA GRILLE AUCITRON / GRILLEDSANGALA WITHLEMON</option>
<option value="194">MINCED NATURE CHICKEN/CUISSE DE POULET SAUSSE CHAMPIGNONS (1)</option>
<option value="105">THE AU LAIT / TEAWITH MILK</option>
<option value="175">CREPE AU MIEL / CREPWITH HONNEY</option>
<option value="128">SANDUICH AUJAMBON / HUMSANDUICH</option>
<option value="117">CAPPUCHINO/ESRESSO FOUETE</option>
<option value="316">courgette (15)</option>
<option value="388">emballage</option>
<option value="35">HUMBOURGER (123)</option>
<option value="32">HARICOT STAFF (79.50)</option>
<option value="139">SANDUICH AU THON</option>
<option value="115">CAFE MACHIATO</option>
<option value="30">FARINE MAIS (10)</option>
<option value="338">GDE CUILLERE</option>
<option value="391">porte bon de commande</option>
<option value="143">CROQUE MONSIEUR (1)</option>
<option value="283">LAITUE (42)</option>
<option value="394">ondulaire</option>
<option value="55">SAUCE TOMATE (160)</option>
<option value="376">saliere</option>
<option value="199">MUKEKEGRILLE / GRILLEDMUKEKE</option>
<option value="23">CAFE EN GRAINE (12.50)</option>
<option value="328">PRIME DE JAPON (2)</option>
<option value="168">TOMATE FARCIE AU THON/TOMATO STUFFED WITH TUNA</option>
<option value="123">JUSMANGUE / MANGOJUICE</option>
<option value="49">PAILLE (23)</option>
<option value="332">AUBERGINE</option>
<option value="64">THON (13)</option>
<option value="298">CONCOMBRE (9)</option>
<option value="166">SALADE OEUF A LARUSSE / EGGSRUSSIAN SALAD</option>
<option value="333">PILAOU MASARA</option>
<option value="351">MUSCADE</option>
<option value="311">FROMAGE (2)</option>
<option value="341">GATAO (12)</option>
<option value="293">OIGNON ROUGE (13)</option>
<option value="375">saliere</option>
<option value="103">THE VERT/GREEN TEA</option>
<option value="116">CAFE LATIN</option>
<option value="91">JB (11)</option>
<option value="153">OEUF NATURE/EGGS PLAIN</option>
<option value="29">FARINE AZAM (9)</option>
<option value="152">OMOLETTES OIGNONS CHAMPIGNONS/MOUSHROOM ONION OMOLLET</option>
<option value="4">SERVIETTES (165)</option>
<option value="162">SALADEVEGETARIENNE / VEGETABLE SALAD</option>
<option value="14">BON D&#039;ENTREE (8)</option>
<option value="34">HUILE DE CUISINE (140)</option>
<option value="383">vinaigre (2)</option>
<option value="207">EPINARD A LA CREME/SPINACH IN A CREAMY</option>
<option value="386">serviettes en tissus</option>
<option value="53">SANGALA (150)</option>
<option value="335">PTE ASSIETTE</option>
<option value="48">RIZ PERSONNEL (86)</option>
<option value="19">DEMANDE D&#039;ACHATS (9)</option>
<option value="181">BROCHETTECHEVRE / GOAT KEBAB (1)</option>
<option value="24">CREME FRESH (18)</option>
<option value="365">tuyaux flexible</option>
<option value="138">HUMBOURGER AUPOULET / CHICKENBURGER</option>
<option value="201">MUKEKE DESOSSE GRILLE AU CITRON</option>
<option value="52">SAMBOUSSA (885)</option>
<option value="125">JUS D&#039;ANANA MANGUE</option>
<option value="393">pile crayon</option>
<option value="5">SAVON LIQUIDE (38)</option>
<option value="61">THE VERT (1)</option>
<option value="384">vinaigre</option>
<option value="20">1/4 POULET (122)</option>
<option value="68">SACHET POUBEL (10)</option>
<option value="15">FACTURIER (10)</option>
<option value="172">SALADE DEFRUIT / FRUIT SALAD</option>
<option value="291">POIVRE NOIR (8)</option>
<option value="165">SALADNICOISE / CREAMYAVICADO GUNASALAD</option>
<option value="51">PRESTIGE (21)</option>
<option value="50">PILIPILI (77)</option>
<option value="177">BEEF AUCHAMPIGNION / BEEFFILET WITHMUSHROOM</option>
<option value="6">P MOUCHOIR (9)</option>
</select>

<div class="help-block help-block-error"></div>

</div>                            </div>

                        
                                                    <div class="col-sm-3">
                                <div class="form-group highlight-addon field-invoiceitem-0-quantity required">
<label class="form-label has-star" for="invoiceitem-0-quantity">Quantity</label>

<input type="text" id="invoiceitem-0-quantity" class="quantity form-control" name="InvoiceItem[0][quantity]" aria-required="true">

<div class="help-block help-block-error"></div>

</div>                            </div>
                        
                    
                                            <div class="col-sm-3">
                            <div class="form-group highlight-addon field-invoiceitem-0-price required">
<label class="form-label has-star" for="invoiceitem-0-price">Price</label>

<input type="text" id="invoiceitem-0-price" class="unit-price form-control inv-editable" name="InvoiceItem[0][price]" aria-required="true">

<div class="help-block help-block-error"></div>

</div>                        </div>
                    
                                            <div class="highlight-addon field-invoiceitem-0-tax_id">
<input type="hidden" id="invoiceitem-0-tax_id" class="tax-rate form-control inv-editable" name="InvoiceItem[0][tax_id]" data-tax-rate="">
</div>                    
                    
                    <div class="col-sm-1">
                        <div style="margin-top:24px;">
                            <button class="btn btn-primary btn-xs add-item"><i class="fa fa-plus-circle"></i></button>
                            <button class="btn btn-danger btn-xs remove-item"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div><!-- .row -->
                    </div>
        </div>
        <div class="text-right">
            <p style="padding-right:5px; margin-right: 30px;"><strong>Subtotal: <span id="subTotal">0</span></strong><br></p>
            <p id="discountParent" style="padding-right:5px; margin-right: 30px;"><strong>Discount: <span id="discount">0</span></strong><br></p>
            <p style="padding-right:5px; margin-right: 30px;"><strong>Sales Tax: <span id="taxesTotal">0</span></strong></p>
            <p style="padding:5px; margin-right: 30px; border-top: solid 1px black;border-bottom: double 3px black;margin-left:70%;font-size:18px;"><strong>Total: <span id="grandTotal">0</span></strong></p>
        </div>


        
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Create Invoice</button>        </div>

        <span class="clearfix"></span>
    </div>

    <div class="panel-footer">
        Thank you for being our good customer. We look forward to serving you in the future.    </div>
</div>

</form>
<!-- Add New Customer -->


<div id="modal-new-customer" class="fade modal" role="dialog">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4>Add New Customer</h4>
</div>
<div class="modal-body">


<div class="customer-form">

    <form id="form-customer-new" class="form-vertical kv-form-bs3" action="/index.php/accounting/invoices/create" method="post" autocomplete="off">
<input type="hidden" name="_csrf" value="CBqJAbCJVuFXLFzJg-QmAFUShLNKVoeZV5D6Q4s_EmlfWblE3_k-pgcaGquw0EUxBVS89gNisqkHoZQu03pDLQ==">
    <div class="row">
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-business_name required">
<label class="form-label has-star" for="customer-business_name">Business Name</label>

<input type="text" id="customer-business_name" class="form-control" name="Customer[business_name]" maxlength="50" aria-required="true">

<div class="help-block help-block-error"></div>

</div></div>
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-contact_name">
<label class="form-label has-star" for="customer-contact_name">Contact Person</label>

<input type="text" id="customer-contact_name" class="form-control" name="Customer[contact_name]" maxlength="50">

<div class="help-block help-block-error"></div>

</div></div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group highlight-addon field-customer-website">
<label class="form-label has-star" for="customer-website">Website</label>

<input type="text" id="customer-website" class="form-control" name="Customer[website]">

<div class="help-block help-block-error"></div>

</div>        </div>
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-mobile">
<label class="form-label has-star" for="customer-mobile">Mobile</label>

<input type="text" id="customer-mobile" class="form-control" name="Customer[mobile]" maxlength="50">

<div class="help-block help-block-error"></div>

</div></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group highlight-addon field-customer-customer_code">
<label class="form-label has-star" for="customer-customer_code">Customer Code</label>

<input type="text" id="customer-customer_code" class="form-control" name="Customer[customer_code]">

<div class="help-block help-block-error"></div>

</div>        </div>
        <div class="col-md-6"> <div class="form-group highlight-addon field-customer-terms">
<label class="form-label has-star" for="customer-terms">Pay After (Days)</label>

<input type="text" id="customer-terms" class="form-control" name="Customer[terms]">

<div class="help-block help-block-error"></div>

</div></div>
    </div>

    <div class="row">
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-tax_id">
<label class="form-label has-star" for="customer-tax_id">Taxpayer Identity (TIN)</label>

<input type="text" id="customer-tax_id" class="form-control" name="Customer[tax_id]" maxlength="20">

<div class="help-block help-block-error"></div>

</div></div>
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-vrn">
<label class="form-label has-star" for="customer-vrn">VAT Registration Number</label>

<input type="text" id="customer-vrn" class="form-control" name="Customer[vrn]">

<div class="help-block help-block-error"></div>

</div></div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group highlight-addon field-customer-emails">
<label class="form-label has-star" for="customer-emails">Emails</label>

<textarea id="customer-emails" class="form-control" name="Customer[emails]" rows="6" placeholder="In case of multiple emails, each email should be in its own new line."></textarea>

<div class="help-block help-block-error"></div>

</div>        </div>
        <div class="col-md-6"><div class="form-group highlight-addon field-customer-address">
<label class="form-label has-star" for="customer-address">Address</label>

<textarea id="customer-address" class="form-control" name="Customer[address]" rows="6"></textarea>

<div class="help-block help-block-error"></div>

</div></div>
    </div>

    <div class="form-group">
        <button type="submit" id="btn-submit-customer" class="btn btn-success btn-block">Save</button>    </div>

    </form>
</div>

</div>

</div>
</div>
</div><!-- /Add New Customer -->

<!-- Add New Product -->

<div id="modal-new-product" class="fade modal" role="dialog">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4>Add New Product</h4>
</div>
<div class="modal-body">

<div class="panel">
    <div class="panel-body">
        <div class="alert alert-danger" id="id-message-discount" style="display:none ;">
            You have marked this Product as Discount object. You must set Name, Is Sold, discount amount (on Sales Price) and Sales Discount Account in default accounts only. All other fields can be left blank        </div>

        <form id="form-product-new" class="form-vertical kv-form-bs3" action="/index.php/accounting/invoices/create" method="post" autocomplete="off">
<input type="hidden" name="_csrf" value="CBqJAbCJVuFXLFzJg-QmAFUShLNKVoeZV5D6Q4s_EmlfWblE3_k-pgcaGquw0EUxBVS89gNisqkHoZQu03pDLQ==">
        
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General Information</a></li>
                <li role="presentation"><a href="#accounts" aria-controls="accounts" role="tab" data-toggle="tab">Default Accounts</a></li>
                <li role="presentation"><a href="#extra" aria-controls="accounts" role="tab" data-toggle="tab">More Information</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="general">
                    <br>
                    <div class="form-group highlight-addon field-productservice-name required">
<label class="form-label has-star" for="productservice-name">Name</label>

<input type="text" id="productservice-name" class="form-control" name="ProductService[name]" maxlength="200" aria-required="true">

<div class="help-block help-block-error"></div>

</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-purchase_price">
<label class="form-label has-star" for="productservice-purchase_price">Purchase Price</label>

<input type="text" id="productservice-purchase_price-disp" class="form-control" name="productservice-purchase_price-disp">
<div style="display:none"><input type="text" id="productservice-purchase_price" class="form-control" name="ProductService[purchase_price]" data-krajee-numberControl="numberControl_e6a11314" tabindex="10000"></div>

<div class="help-block help-block-error"></div>

</div>                        </div>
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-purchase_tax">
<label class="form-label has-star" for="productservice-purchase_tax">Purchase Tax</label>

<div class="kv-plugin-loading loading-productservice-purchase_tax">&nbsp;</div><select id="productservice-purchase_tax" class="form-control" name="ProductService[purchase_tax]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_5c9282ba" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Purchase Tax</option>
<option value="10">VAT - 10%</option>
<option value="11">VAT - 18%</option>
<option value="12">Exempt - 0%</option>
<option value="14">Special Rate - 15%</option>
<option value="13">Special Relief - 5%</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-sales_price">
<label class="form-label has-star" for="productservice-sales_price">Sales Price</label>

<input type="text" id="productservice-sales_price-disp" class="form-control" name="productservice-sales_price-disp">
<div style="display:none"><input type="text" id="productservice-sales_price" class="form-control" name="ProductService[sales_price]" data-krajee-numberControl="numberControl_f7a15d1f" tabindex="10000"></div>

<div class="help-block help-block-error"></div>

</div>                        </div>
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-sales_tax">
<label class="form-label has-star" for="productservice-sales_tax">Sales Tax</label>

<div class="kv-plugin-loading loading-productservice-sales_tax">&nbsp;</div><select id="productservice-sales_tax" class="form-control" name="ProductService[sales_tax]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_22bf22f0" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Sales Tax</option>
<option value="10">VAT - 10%</option>
<option value="11">VAT - 18%</option>
<option value="12">Exempt - 0%</option>
<option value="14">Special Rate - 15%</option>
<option value="13">Special Relief - 5%</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><div class="form-group highlight-addon field-id-selling-checkbox">
<div class="checkbox"><label class="form-label has-star" for="id-selling-checkbox">
<input type="hidden" name="ProductService[is_selling]" value="0"><input type="checkbox" id="id-selling-checkbox" name="ProductService[is_selling]" value="1">
Is Sold
</label>
<div class="help-block help-block-error"></div>
</div>
</div></div>
                                <div class="col-md-6"><div class="form-group highlight-addon field-id-purchasing-checkbox">
<div class="checkbox"><label class="form-label has-star" for="id-purchasing-checkbox">
<input type="hidden" name="ProductService[is_purchasing]" value="0"><input type="checkbox" id="id-purchasing-checkbox" name="ProductService[is_purchasing]" value="1">
Is Purchased
</label>
<div class="help-block help-block-error"></div>
</div>
</div></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><div class="form-group highlight-addon field-id-discount-checkbox">
<div class="checkbox"><label class="form-label has-star" for="id-discount-checkbox">
<input type="hidden" name="ProductService[is_discount_item]" value="0"><input type="checkbox" id="id-discount-checkbox" name="ProductService[is_discount_item]" value="1">
Discount Item?
</label>
<div class="help-block help-block-error"></div>
</div>
</div></div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="accounts">
                    <br>
                    <div class="row">
                        <div class="col-md-13">
                            <div class="form-group highlight-addon field-productservice-purchases_account">
<label class="form-label has-star" for="productservice-purchases_account">Purchases Account</label>

<div class="kv-plugin-loading loading-productservice-purchases_account">&nbsp;</div><select id="productservice-purchases_account" class="form-control" name="ProductService[purchases_account]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_35e9c953" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Purchase Account</option>
<option value="28">500 - Cost of Goods Sold</option>
<option value="29">501 - Manufacturing Expenses</option>
<option value="30">510 - IT and Internet Expenses</option>
<option value="31">511 - Bank Fees and Charges</option>
<option value="32">512 - Credit Card Charges</option>
<option value="33">513 - Office Supplies</option>
<option value="34">514 - National Travel</option>
<option value="35">515 - Transportation Expenses</option>
<option value="36">516 - Rent Expenses</option>
<option value="37">517 - Printing and Stationery</option>
<option value="38">518 - Wages &amp; Salaries Expenses</option>
<option value="39">519 - Consulting &amp; Accounting Expenses</option>
<option value="40">520 - Depreciation Expenses</option>
<option value="41">521 - Repair and Maintenance</option>
<option value="42">522 - Telephone Expenses</option>
<option value="43">523 - Income Tax Expense</option>
<option value="44">524 - Electricity Expenses</option>
<option value="45">525 - Water Expenses</option>
<option value="46">526 - Inventory Losses</option>
<option value="47">527 - Advertising and Marketing</option>
<option value="48">528 - Loan Interest Expenses</option>
<option value="49">529 - Wages &amp; Salaries Tax Expenses</option>
<option value="50">530 - Branch Stock Transferred</option>
<option value="51">540 - Purchase Discount</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-sales_account">
<label class="form-label has-star" for="productservice-sales_account">Sales Account</label>

<div class="kv-plugin-loading loading-productservice-sales_account">&nbsp;</div><select id="productservice-sales_account" class="form-control" name="ProductService[sales_account]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_3f3285f1" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Sales Account</option>
<option value="23">400 - Sales</option>
<option value="24">420 - Other Income</option>
<option value="25">421 - Interest Income</option>
<option value="26">440 - Sales Discount</option>
<option value="27">441 - Sales Returns and Allowances</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-sales_discount_account">
<label class="form-label has-star" for="productservice-sales_discount_account">Sales Discount</label>

<div class="kv-plugin-loading loading-productservice-sales_discount_account">&nbsp;</div><select id="productservice-sales_discount_account" class="form-control" name="ProductService[sales_discount_account]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_2d4f8a11" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Sales Discount Account</option>
<option value="26">440 - Sales Discount</option>
<option value="27">441 - Sales Returns and Allowances</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="extra">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-category">
<label class="form-label has-star" for="productservice-category">Category</label>

<div class="kv-plugin-loading loading-productservice-category">&nbsp;</div><select id="productservice-category" class="form-control" name="ProductService[category]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_110b6d12" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Category</option>
<option value="1">PRODUITS DE NETTOYAGE</option>
<option value="2">MATERIELS DE BUREAU</option>
<option value="3">NOURRITURE</option>
<option value="4">AUTRES FOURNITURES</option>
<option value="5">BOISSONS</option>
<option value="6">THE/TEA</option>
<option value="7">CAFÉ/COFFEE</option>
<option value="8">JUS FRAIS/FRESH JUICES</option>
<option value="9">SANDUICH/SANDUICHES</option>
<option value="10">OMORETTES/OMOLETS</option>
<option value="11">SOUPES /SOUPS</option>
<option value="12">SALADES/SALADS</option>
<option value="13">DESSERTS</option>
<option value="14">VIANDES ROUGE/RED MEAT</option>
<option value="15">SNACK</option>
<option value="16">POULET/CHICKEN</option>
<option value="17">POISSON/FISH</option>
<option value="18">ACCOMPAGNEMENT/SIDE DISHES</option>
<option value="19">Pates/Pastas</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>

                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-brand">
<label class="form-label has-star" for="productservice-brand">Brand</label>

<div class="kv-plugin-loading loading-productservice-brand">&nbsp;</div><select id="productservice-brand" class="form-control" name="ProductService[brand]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_7968fcdd" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">Select Brand</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="form-group highlight-addon field-productservice-model">
<label class="form-label has-star" for="productservice-model">Model</label>

<input type="text" id="productservice-model" class="form-control" name="ProductService[model]">

<div class="help-block help-block-error"></div>

</div></div>

                        <div class="col-md-6"><div class="form-group highlight-addon field-productservice-sku">
<label class="form-label has-star" for="productservice-sku">SKU/Serial/Plate No.</label>

<input type="text" id="productservice-sku" class="form-control" name="ProductService[sku]">

<div class="help-block help-block-error"></div>

</div></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"><div class="form-group highlight-addon field-productservice-upc">
<label class="form-label has-star" for="productservice-upc">Barcode</label>

<input type="text" id="productservice-upc" class="form-control" name="ProductService[upc]">

<div class="help-block help-block-error"></div>

</div></div>

                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-unit">
<label class="form-label has-star" for="productservice-unit">Measured in?</label>

<div class="kv-plugin-loading loading-productservice-unit">&nbsp;</div><select id="productservice-unit" class="form-control" name="ProductService[unit]" data-s2-options="s2options_3267a624" data-krajee-select2="select2_4453842b" style="width: 100%; height: 1px; visibility: hidden;">
<option value="">How is it Measured?</option>
<option value="1">pce</option>
<option value="2">LITRE</option>
<option value="3">PC</option>
<option value="4">PQT</option>
<option value="5">PORTION</option>
<option value="6">KG</option>
<option value="7">BTLLE</option>
<option value="8">BOITE</option>
<option value="9">GODETS</option>
<option value="10">VERRE</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-reorder_level">
<label class="form-label has-star" for="productservice-reorder_level">Reorder Level</label>

<input type="text" id="productservice-reorder_level-disp" class="form-control" name="productservice-reorder_level-disp">
<div style="display:none"><input type="text" id="productservice-reorder_level" class="form-control" name="ProductService[reorder_level]" data-krajee-numberControl="numberControl_977398bc" tabindex="10000"></div>

<div class="help-block help-block-error"></div>

</div>                        </div>

                        <div class="col-md-6">
                            <div class="form-group highlight-addon field-productservice-product_type">
<label class="form-label has-star" for="productservice-product_type">Product Type</label>

<select id="productservice-product_type" class="form-control" name="ProductService[product_type]">
<option value="">Select Type</option>
<option value="1000" selected>Final Product</option>
<option value="1002">Raw Material</option>
<option value="1003">Intermediate Product</option>
<option value="1001">School Fees</option>
<option value="1004">Hotel Room</option>
<option value="1007">Prepared Food/Drink</option>
<option value="1006">Ready Made Food/Drink</option>
<option value="1008">Asset</option>
<option value="1005">Fuel</option>
<option value="1014">Hospital Consultation Fees</option>
<option value="1015">Hospital Lab Items</option>
</select>

<div class="help-block help-block-error"></div>

</div>                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">Save</button>        </div>

        </form>    </div>
</div>

</div>

</div>
</div>
</div><!-- /Add New Product -->
</div>
<br>
                </div>
            </div>
            <!-- /page content -->
            <!-- footer content -->
            <footer>
                <div class="text-center">
                    <!--Adiuta Business Assistant. < ?= Yii::t('app', 'Copyright {y}, Hosanna Higher Technologies Co. Ltd.', ['y' => date('Y')]) ?-->
                    Adiuta Business Assistant. Copyright 2023                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
    <!-- /footer content -->
    <script src="/assets/a8d75b2c/jquery.js?v=1700489677"></script>
<script src="/assets/8eddfaed/yii.js?v=1700489677"></script>
<script src="/assets/8eddfaed/yii.activeForm.js?v=1700489677"></script>
<script src="/assets/5e8239d8/js/bootstrap.js?v=1700489678"></script>
<script src="/assets/6a5b57e7/js/activeform.min.js?v=1700489732"></script>
<script src="/assets/e45df2e0/js/select2.full.min.js?v=1700489732"></script>
<script src="/assets/10604a0f/js/select2-krajee.min.js?v=1700489732"></script>
<script src="/assets/8ea152c1/js/kv-widgets.min.js?v=1700489732"></script>
<script src="/assets/8eddfaed/yii.validation.js?v=1700489677"></script>
<script src="/assets/b90eb076/js/bootstrap-datepicker.min.js?v=1700489732"></script>
<script src="/assets/b90eb076/js/datepicker-kv.min.js?v=1700489732"></script>
<script src="/assets/ae17e1b/yii2-dynamic-form.min.js?v=1700489760"></script>
<script src="/assets/ae4b40a7/jquery.inputmask.bundle.js?v=1700489773"></script>
<script src="/assets/59bf734b/js/number.min.js?v=1700489773"></script>
<script src="/assets/c55c20f1/bootstrap-progressbar.min.js?v=1700489678"></script>
<script src="/assets/b35f38de/helpers/smartresize.js?v=1700489678"></script>
<script src="/assets/b35f38de/custom.js?v=1700489678"></script>
<script src="/assets/a3371f2e/js/extension.js?v=1700489678"></script>
<script src="/js/chart.min.js?v=1659189201"></script>
<script src="/js/bootbox.min.js?v=1659189201"></script>
<script src="/js/yii-override.js?v=1659189201"></script>
<script>     $(document).ready(function(){
        checkAndDisable();
        
        $('form').on('submit', function(e){
            $('form :input').prop('disabled', false);
        });
        
        checkAndDisable();

        //add new customer on fly
        $('#form-customer-new').on('submit', function(e){
            e.preventDefault();
            if(!e.originalEvent){
                return false;
            }
            var data = $('#form-customer-new').serialize();

            $('#progress').show();
            $('form :input').prop('disabled','disabled');
            $.ajax({
                url: '/accounting/customers/create',
                type: 'POST',
                data: data,
                success: function(data, textStatus, jqXHR) {
                    if(data.success){
                        var customer = data.customer;
                        var option = new Option(customer.business_name, customer.id);
                        option.selected = true;

                        $('#customer').append(option);
                        $('#customer').trigger('change');

                    }
                    //clear form inputs
                    $('#form-customer-new').find("input[type=text], input[type=password], textarea").val("")
                    //Close dialog
                    $('#modal-new-customer').modal('hide');

                    $('#progress').hide();
                    $('form :input').prop('disabled', false);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var errorMessage = jqXHR.responseText;
                    if (errorMessage.length > 0) {
                        alert(errorMessage);
                    }
                    $('#progress').hide();
                    $('form :input').prop('disabled', false);
                }
            }); 
        });

        //add new product on fly
        $('#form-product-new').on('submit', function(e){
            e.preventDefault();
            if(!e.originalEvent){
                return false;
            }
            var data = $('#form-product-new').serialize();

            $('#progress').show();
            $('form :input').prop('disabled','disabled');
            $.ajax({
                url: '/inventory/products/create',
                type: 'POST',
                data: data,
                success: function(data, textStatus, jqXHR) {
                    if(data.success){
                        var product = data.product;

                        $(".item-name" ).each(function(){
                            var option = new Option(product.name, product.id, false, false);
                            $(this).append(option);
                            $(this).trigger('change');

                            new_product_list.push('<option value="'+ product.id +'">'+ product.name +'</option>');
                        });
                    }
                    //clear form inputs
                    $('#form-product-new').find("input[type=text], input[type=password], textarea").val("")
                    
                    //Close dialog
                    $('#modal-new-product').modal('hide');

                    $('#progress').hide();
                    $('form :input').prop('disabled', false);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var errorMessage = jqXHR.responseText;
                    if (errorMessage.length > 0) {
                        alert(errorMessage);
                    }
                    $('#progress').hide();
                    $('form :input').prop('disabled', false);
                }
            })
            .fail(function(e){
                alert(e.responseText);
            })
            .always(function() { 
                recalculate();
                
                $('#progress').hide();
                $('form :input').prop('disabled', false);
                checkAndDisable();
            }); 
        }); 
    });

    function checkAndDisable(){
        if(allow_editing == 0){
            $('.container-items :input.inv-editable').prop('disabled','disabled');
        }
    }
    
    //=======================
    //    Customer Selection
    //=======================
    function loadCustomer(id, changeDueDate = true){
        $('#progress').show();
        $('form :input').prop('disabled','disabled');
        
        $.ajax({
            dataType: "json", 
            url: "/index.php/accounting/invoices/customer?id="+id, 
            success: function(json){
                $('#business_name').text(json.business_name);
                if(json.address){
                        $('#address').html(json.address.replace(/\n/g, '<br/>'));
                }
                $('#contact_name').text(json.contact_name);
                $('#mobile').text(json.mobile);
                $('#website').text(json.website);

                //set global values
                customer_terms = json.terms;
                income_account = json.income_account;

                if(changeDueDate){
                    var currentDate = new Date($('#invoice-date').val());
                    currentDate.setDate(currentDate.getDate() + customer_terms );
                    $('#due_date-kvdate').kvDatepicker('setDate', currentDate);
                }
            
                $('#progress').hide();
                $('form :input').prop('disabled', false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
                $('#progress').hide();
                $('form :input').prop('disabled', false);
            },
            timeout: 10000 // sets timeout to 10 seconds
        })
        .fail(function(e){
            alert(e.responseText);
        })
        .always(function() { 
            recalculate();
            
            $('#progress').hide();
            $('form :input').prop('disabled', false);
            checkAndDisable();
        });
    }

    function clearCustomer(){
        $('#business_name').text('');
        $('#address').html('');
        $('#contact_name').text('');
        $('#mobile').text('');
        $('#website').text('');

        //set global values
        customer_terms = 14;
        income_account = null;
    }

    //=======================
    // Delivery Stuffs
    //=======================
    function clearPlateNumber(){
        $('#vehicle').val('').trigger('change');
    }

    function loadPlateNumber(id){
        if(id){
            $('#progress').show();
            $('form :input').prop('disabled','disabled');
            
            $.ajax({dataType: 'json', url: '/accounting/delivery-personnels/view?id='+id, success: function(json){
                $('#vehicle').val(json.vehicle).trigger('change');

                $('#progress').hide();
                $('form :input').prop('disabled', false);
            }})
            .fail(function(e){
                alert(e.responseText);
            })
            .always(function() { 
                recalculate();
                
                $('#progress').hide();
                $('form :input').prop('disabled', false);
                checkAndDisable();
            });
        }
    }
    //=======================
    //    Invoice Stuffs
    //=======================
    $('.container-items').on('change', '.tax-rate', function(e){   
        var taxRateSel = $('option:selected',this).attr('data-rate');
        $(this).attr('data-tax-rate', taxRateSel);
       recalculate();
    });

    $('.container-items').on('input', '.quantity, .unit-price,.discount', function(e){
       var price = $(this).closest('.row').find('.unit-price').val() || 0;
       var tax = $(this).closest('.row').find('.tax-rate').val() || 0;
       var quantity = $(this).closest('.row').find('.quantity').val() || 0;

       $(this).closest('.row').find('.tax-rate').val(tax);
       $(this).closest('.row').find('.gross').val(price * quantity);

       recalculate();
    });

    $('#tax-calculations').on('change', function(){
        recalculate();
    });

    function recalculate(){        
        var taxes = 0.0; 
        var discount = 0.0; 
        var taxExclusive = 0.0; 
        var nonTaxAmount = 0.0; 
        var directDiscount = 0.0; 

        var isTaxExclusive = $('#tax-calculations').val() == 1;

        
        $(".unit-price" ).each(function(){
            //calculate tax
            var isDiscountItem = parseFloat($(this).parents('.row').find('.item-name').attr('data-is-discount'));
            if(isNaN(isDiscountItem)){
                isDiscountItem = 0;
            }

            var currentAmount = parseFloat($(this).val()) * parseFloat($(this).parents('.row').find('.quantity').val());
            if(isNaN(currentAmount)){
                currentAmount = 0;
            }

            if(isDiscountItem == 1){
                directDiscount += currentAmount;
            } else {
                nonTaxAmount += currentAmount;
                //calculate tax
                var taxRate = parseFloat($(this).parents('.row').find('.tax-rate').attr('data-tax-rate'));
                if(isNaN(taxRate)){
                    taxRate = 0;
                }
                
                var disc = parseFloat($(this).parents('.row').find('.discount').val());
                if(isNaN(disc)){
                    disc = 0;
                }
                
                discount = discount + disc;
                currentAmount = currentAmount - discount; //Taxable sale price 
                
                if(isTaxExclusive){
                    //current amount
                    taxes += (taxRate * currentAmount/100.0);
                    taxExclusive = taxExclusive + currentAmount;
                } else {
                    var taxExcludedPrice  = Number.parseFloat((currentAmount/((taxRate /100.0) + 1 )).toFixed(2));
                    taxExclusive = taxExclusive + taxExcludedPrice;

                    //tax
                    taxes += (currentAmount - taxExcludedPrice);
                }
            }
        });

        if(discount == 0 && directDiscount == 0){
            $('#discountParent').hide();
        } else {
            $('#discountParent').show();
        }

        if(directDiscount > 0){
            taxes = 0.0;
            discountedAmount = nonTaxAmount - directDiscount - discount;

            var taxRate = $('.item-name')
                .filter(function( index ) {
                    return $(this).attr("data-is-discount") == 0;
                })
                .parents('.row')
                .find('.tax-rate').attr('data-tax-rate');

            taxRate = parseFloat(taxRate);

            if(isNaN(taxRate)){
                taxRate = 0;
            }
        
            if(isTaxExclusive){
                //current amount
                taxes = taxRate * discountedAmount/100.0;
            } else {
                var taxExcludedPrice  = Number.parseFloat((discountedAmount/((taxRate /100.0) + 1 )).toFixed(2));
                taxExclusive = taxExclusive + taxExcludedPrice;
                //tax
                taxes  = currentAmount - taxExcludedPrice;
            }

            $('#subTotal').text(thousands_separators(nonTaxAmount - directDiscount - discount));
            $('#discount').text(thousands_separators(directDiscount + discount));
            $('#taxesTotal').text(thousands_separators(taxes));
            $('#grandTotal').text(thousands_separators(nonTaxAmount - directDiscount - discount + taxes));
        } else {
            $('#subTotal').text(thousands_separators(taxExclusive));
            $('#discount').text(thousands_separators(discount));
            $('#taxesTotal').text(thousands_separators(taxes));
            $('#grandTotal').text(thousands_separators(taxExclusive + taxes));
        }
    }

    function fillRow(id, row){
        $('#progress').show();
        $('form :input').prop('disabled','disabled');
        
        $.getJSON('/accounting/products-services/view?id='+id, function(result){
            //get parent of class row
           $(row).find('.unit-price').val(result.sales_price);
           $(row).find('.quantity').val(1);
           $(row).find('.gross').val(result.sales_price * 1);

           var taxRate = parseFloat(result.sales_tax_rate) || 0;

           $(row).find('.tax-rate').val(result.sales_tax);
           $(row).find('.tax-rate').attr('data-tax-rate', taxRate);

           $(row).find('.item-name').attr('data-is-discount', result.is_discount_item ? '1' : '0');
           
           var sales_account = result.sales_account;
           if(sales_account == null){
             sales_account = income_account;
           }
           $(row).find('.income-account').val(sales_account).trigger('change');
        })
        .fail(function(e){
            alert(e.responseText);
        })
        .always(function() { 
            recalculate();
            
            $('#progress').hide();
            $('form :input').prop('disabled', false);
            checkAndDisable();
        });
    }

    function thousands_separators(num)
    {
        return num.toLocaleString('en');
    }

    //Global event to this file
    jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        $(this).find('.kv-plugin-loading').hide(); //hide loading element

        $.each(new_product_list, function(key, value){
            $($(item).find('select').first()[0]).append(value);
        })

        $(item).on("select2:select", jQuery("#item-" + product_index), function(e) {
            var id = e.params.data.id;
            fillRow(id, item);
        });
    });

    jQuery(".dynamicform_wrapper").on("afterDelete", function(e, item) {
        recalculate();
    });
    $(document).ready(function(){
        $('#id-discount-checkbox').on('change', function(){
            if (this.checked) {
                $('#id-message-discount').show();
                $('#id-purchasing-checkbox').prop('checked', !this.checked);
                $('#id-raw-material-checkbox').prop('checked', !this.checked);
                $('#id-selling-checkbox').prop('checked', this.checked);
            } else {
                $('#id-message-discount').hide();
            }
        })
    });
$("body").delegate('form','submit', function () {
    $('#progress').show();
});

/* To initialize BS3 tooltips set this below */
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});;
/* To initialize BS3 popovers set this below */
$(function () { 
    $("[data-toggle='popover']").popover({
        "trigger": "manual",   
    }); 
});

//Fix Select is not focusing the search text
$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
}); </script>
<script>jQuery(function ($) {
var $el=jQuery("#dynamic-form .kv-hint-special");if($el.length){$el.each(function(){$(this).activeFieldHint()});}
jQuery&&jQuery.pjax&&(jQuery.pjax.defaults.maxCacheLength=0);
if (jQuery('#customer').data('select2')) { jQuery('#customer').select2('destroy'); }
jQuery.when(jQuery('#customer').select2(select2_56b324c8)).done(initS2Loading('customer','s2options_3267a624'));
jQuery('#customer').on('select2:select', function(e){ loadCustomer(e.params.data.id); });
jQuery('#customer').on('select2:unselect', function(e){ clearCustomer(); });

jQuery.fn.kvDatepicker.dates={};
if (jQuery('#invoice-date').data('kvDatepicker')) { jQuery('#invoice-date').kvDatepicker('destroy'); }
jQuery('#invoice-date-kvdate').kvDatepicker(kvDatepicker_715bcd45);
jQuery('#invoice-date-kvdate').on('changeDate', function(e) {  
                            var currentDate = new Date(e.date);
                            currentDate.setDate(currentDate.getDate() + customer_terms );
                            $('#due_date-kvdate').kvDatepicker('setDate', currentDate);
                        });

initDPRemove('invoice-date');
initDPAddon('invoice-date');
if (jQuery('#due_date').data('kvDatepicker')) { jQuery('#due_date').kvDatepicker('destroy'); }
jQuery('#due_date-kvdate').kvDatepicker(kvDatepicker_715bcd45);

initDPRemove('due_date');
initDPAddon('due_date');
if (jQuery('#item_0').data('select2')) { jQuery('#item_0').select2('destroy'); }
jQuery.when(jQuery('#item_0').select2(select2_6635279c)).done(initS2Loading('item_0','s2options_3267a624'));
jQuery('#item_0').on('select2:select', function(e) { 
                                    var id = e.params.data.id;
                                    var row = $(e.currentTarget).closest('.row')[0];
                                    fillRow(id, row)
                                });

jQuery("#dynamic-form").on("click", ".add-item", function(e) {
    e.preventDefault();
    jQuery(".dynamicform_wrapper").triggerHandler("beforeInsert", [jQuery(this)]);
    jQuery(".dynamicform_wrapper").yiiDynamicForm("addItem", dynamicform_164ffe3f, e, jQuery(this));
});

jQuery("#dynamic-form").on("click", ".remove-item", function(e) {
    e.preventDefault();
    jQuery(".dynamicform_wrapper").yiiDynamicForm("deleteItem", dynamicform_164ffe3f, e, jQuery(this));
});

jQuery('#dynamic-form').yiiActiveForm([{"id":"customer","name":"customer","container":".field-customer","input":"#customer","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Customer cannot be blank."});yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Customer must be an integer.","skipOnEmpty":1});}},{"id":"tax-calculations","name":"is_tax_exclusive","container":".field-tax-calculations","input":"#tax-calculations","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Price Calculation cannot be blank."});yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Price Calculation must be either \u00221\u0022 or \u00220\u0022.","skipOnEmpty":1});}},{"id":"invoice-date","name":"invoice_date","container":".field-invoice-date","input":"#invoice-date","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Invoice Date cannot be blank."});}},{"id":"due_date","name":"due_date","container":".field-due_date","input":"#due_date","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Due Date cannot be blank."});}},{"id":"invoice-reference","name":"reference","container":".field-invoice-reference","input":"#invoice-reference","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"LPO\/Reference must be a string.","max":200,"tooLong":"LPO\/Reference should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"item_0","name":"[0]item","container":".field-item_0","input":"#item_0","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Product or Service cannot be blank."});yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Product or Service must be an integer.","skipOnEmpty":1});}},{"id":"invoiceitem-0-quantity","name":"[0]quantity","container":".field-invoiceitem-0-quantity","input":"#invoiceitem-0-quantity","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Quantity cannot be blank."});yii.validation.number(value, messages, {"pattern":/^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/,"message":"Quantity must be a number.","skipOnEmpty":1});}},{"id":"invoiceitem-0-price","name":"[0]price","container":".field-invoiceitem-0-price","input":"#invoiceitem-0-price","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Price cannot be blank."});yii.validation.number(value, messages, {"pattern":/^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/,"message":"Price must be a number.","skipOnEmpty":1});}}], []);
var $el=jQuery("#form-customer-new .kv-hint-special");if($el.length){$el.each(function(){$(this).activeFieldHint()});}
jQuery('#form-customer-new').yiiActiveForm([{"id":"customer-business_name","name":"business_name","container":".field-customer-business_name","input":"#customer-business_name","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Business Name cannot be blank."});yii.validation.string(value, messages, {"message":"Business Name must be a string.","max":50,"tooLong":"Business Name should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"customer-contact_name","name":"contact_name","container":".field-customer-contact_name","input":"#customer-contact_name","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Contact Person must be a string.","max":50,"tooLong":"Contact Person should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"customer-website","name":"website","container":".field-customer-website","input":"#customer-website","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Website must be a string.","max":50,"tooLong":"Website should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"customer-mobile","name":"mobile","container":".field-customer-mobile","input":"#customer-mobile","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Mobile must be a string.","max":50,"tooLong":"Mobile should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"customer-customer_code","name":"customer_code","container":".field-customer-customer_code","input":"#customer-customer_code","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Customer Code must be a string.","max":20,"tooLong":"Customer Code should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"customer-terms","name":"terms","container":".field-customer-terms","input":"#customer-terms","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Pay After (Days) must be an integer.","skipOnEmpty":1});}},{"id":"customer-tax_id","name":"tax_id","container":".field-customer-tax_id","input":"#customer-tax_id","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Taxpayer Identity (TIN) must be a string.","max":20,"tooLong":"Taxpayer Identity (TIN) should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"customer-vrn","name":"vrn","container":".field-customer-vrn","input":"#customer-vrn","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"VAT Registration Number must be a string.","max":20,"tooLong":"VAT Registration Number should contain at most 20 characters.","skipOnEmpty":1});}},{"id":"customer-emails","name":"emails","container":".field-customer-emails","input":"#customer-emails","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Emails must be a string.","max":250,"tooLong":"Emails should contain at most 250 characters.","skipOnEmpty":1});}},{"id":"customer-address","name":"address","container":".field-customer-address","input":"#customer-address","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Address must be a string.","skipOnEmpty":1});}}], []);
jQuery('#modal-new-customer').modal({"show":false});
var $el=jQuery("#form-product-new .kv-hint-special");if($el.length){$el.each(function(){$(this).activeFieldHint()});}
if (jQuery('#productservice-purchase_price').data('numberControl')) { jQuery('#productservice-purchase_price').numberControl('destroy'); }
jQuery('#productservice-purchase_price').numberControl(numberControl_e6a11314);

if (jQuery('#productservice-purchase_tax').data('select2')) { jQuery('#productservice-purchase_tax').select2('destroy'); }
jQuery.when(jQuery('#productservice-purchase_tax').select2(select2_5c9282ba)).done(initS2Loading('productservice-purchase_tax','s2options_3267a624'));

if (jQuery('#productservice-sales_price').data('numberControl')) { jQuery('#productservice-sales_price').numberControl('destroy'); }
jQuery('#productservice-sales_price').numberControl(numberControl_f7a15d1f);

if (jQuery('#productservice-sales_tax').data('select2')) { jQuery('#productservice-sales_tax').select2('destroy'); }
jQuery.when(jQuery('#productservice-sales_tax').select2(select2_22bf22f0)).done(initS2Loading('productservice-sales_tax','s2options_3267a624'));

if (jQuery('#productservice-purchases_account').data('select2')) { jQuery('#productservice-purchases_account').select2('destroy'); }
jQuery.when(jQuery('#productservice-purchases_account').select2(select2_35e9c953)).done(initS2Loading('productservice-purchases_account','s2options_3267a624'));

if (jQuery('#productservice-sales_account').data('select2')) { jQuery('#productservice-sales_account').select2('destroy'); }
jQuery.when(jQuery('#productservice-sales_account').select2(select2_3f3285f1)).done(initS2Loading('productservice-sales_account','s2options_3267a624'));

if (jQuery('#productservice-sales_discount_account').data('select2')) { jQuery('#productservice-sales_discount_account').select2('destroy'); }
jQuery.when(jQuery('#productservice-sales_discount_account').select2(select2_2d4f8a11)).done(initS2Loading('productservice-sales_discount_account','s2options_3267a624'));

if (jQuery('#productservice-category').data('select2')) { jQuery('#productservice-category').select2('destroy'); }
jQuery.when(jQuery('#productservice-category').select2(select2_110b6d12)).done(initS2Loading('productservice-category','s2options_3267a624'));

if (jQuery('#productservice-brand').data('select2')) { jQuery('#productservice-brand').select2('destroy'); }
jQuery.when(jQuery('#productservice-brand').select2(select2_7968fcdd)).done(initS2Loading('productservice-brand','s2options_3267a624'));

if (jQuery('#productservice-unit').data('select2')) { jQuery('#productservice-unit').select2('destroy'); }
jQuery.when(jQuery('#productservice-unit').select2(select2_4453842b)).done(initS2Loading('productservice-unit','s2options_3267a624'));

if (jQuery('#productservice-reorder_level').data('numberControl')) { jQuery('#productservice-reorder_level').numberControl('destroy'); }
jQuery('#productservice-reorder_level').numberControl(numberControl_977398bc);

jQuery('#form-product-new').yiiActiveForm([{"id":"productservice-name","name":"name","container":".field-productservice-name","input":"#productservice-name","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Name cannot be blank."});yii.validation.string(value, messages, {"message":"Name must be a string.","max":200,"tooLong":"Name should contain at most 200 characters.","skipOnEmpty":1});}},{"id":"productservice-purchase_price","name":"purchase_price","container":".field-productservice-purchase_price","input":"#productservice-purchase_price","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/,"message":"Purchase Price must be a number.","skipOnEmpty":1});}},{"id":"productservice-purchase_tax","name":"purchase_tax","container":".field-productservice-purchase_tax","input":"#productservice-purchase_tax","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Purchase Tax must be an integer.","skipOnEmpty":1});}},{"id":"productservice-sales_price","name":"sales_price","container":".field-productservice-sales_price","input":"#productservice-sales_price","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/,"message":"Sales Price must be a number.","skipOnEmpty":1});}},{"id":"productservice-sales_tax","name":"sales_tax","container":".field-productservice-sales_tax","input":"#productservice-sales_tax","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Sales Tax must be an integer.","skipOnEmpty":1});}},{"id":"id-selling-checkbox","name":"is_selling","container":".field-id-selling-checkbox","input":"#id-selling-checkbox","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Is Sold must be either \u00221\u0022 or \u00220\u0022.","skipOnEmpty":1});}},{"id":"id-purchasing-checkbox","name":"is_purchasing","container":".field-id-purchasing-checkbox","input":"#id-purchasing-checkbox","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Is Purchased must be either \u00221\u0022 or \u00220\u0022.","skipOnEmpty":1});}},{"id":"id-discount-checkbox","name":"is_discount_item","container":".field-id-discount-checkbox","input":"#id-discount-checkbox","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.boolean(value, messages, {"trueValue":"1","falseValue":"0","message":"Discount Item? must be either \u00221\u0022 or \u00220\u0022.","skipOnEmpty":1});}},{"id":"productservice-purchases_account","name":"purchases_account","container":".field-productservice-purchases_account","input":"#productservice-purchases_account","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Purchases Account must be an integer.","skipOnEmpty":1});}},{"id":"productservice-sales_account","name":"sales_account","container":".field-productservice-sales_account","input":"#productservice-sales_account","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Sales Account must be an integer.","skipOnEmpty":1});}},{"id":"productservice-sales_discount_account","name":"sales_discount_account","container":".field-productservice-sales_discount_account","input":"#productservice-sales_discount_account","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Sales Discount must be an integer.","skipOnEmpty":1});}},{"id":"productservice-category","name":"category","container":".field-productservice-category","input":"#productservice-category","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Category must be an integer.","skipOnEmpty":1});}},{"id":"productservice-brand","name":"brand","container":".field-productservice-brand","input":"#productservice-brand","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Brand must be an integer.","skipOnEmpty":1});}},{"id":"productservice-model","name":"model","container":".field-productservice-model","input":"#productservice-model","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Model must be a string.","max":100,"tooLong":"Model should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"productservice-sku","name":"sku","container":".field-productservice-sku","input":"#productservice-sku","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"SKU\/Serial\/Plate No. must be a string.","max":100,"tooLong":"SKU\/Serial\/Plate No. should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"productservice-upc","name":"upc","container":".field-productservice-upc","input":"#productservice-upc","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.string(value, messages, {"message":"Barcode must be a string.","max":100,"tooLong":"Barcode should contain at most 100 characters.","skipOnEmpty":1});}},{"id":"productservice-unit","name":"unit","container":".field-productservice-unit","input":"#productservice-unit","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Measured in? must be an integer.","skipOnEmpty":1});}},{"id":"productservice-reorder_level","name":"reorder_level","container":".field-productservice-reorder_level","input":"#productservice-reorder_level","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?$/,"message":"Reorder Level must be a number.","skipOnEmpty":1});}},{"id":"productservice-product_type","name":"product_type","container":".field-productservice-product_type","input":"#productservice-product_type","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {yii.validation.number(value, messages, {"pattern":/^[+-]?\d+$/,"message":"Product Type must be an integer.","skipOnEmpty":1});}}], []);
jQuery('#modal-new-product').modal({"show":false});
});</script>
<script>jQuery(window).on('load', function () {
jQuery("#dynamic-form").yiiDynamicForm(dynamicform_164ffe3f);

});</script>
</body>

</html>
