<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';
$allowed_pages = ['homepage', 'blog', 'contact', 'post1', 'post2', 'post3', 'post4' ,'post5'];
if(!in_array($page, $allowed_pages)) {
    $page = 'homepage';
}

function kuupaevEestiKeeles($timestamp) {
    $kuud = [
        1 => 'jaanuar', 'veebruar', 'märts', 'aprill', 'mai', 'juuni',
        'juuli', 'august', 'september', 'oktoober', 'november', 'detsember'
    ];
    $paev = date('j', $timestamp);
    $kuu = $kuud[(int)date('n', $timestamp)];
    $aasta = date('Y', $timestamp);
    return "$paev. $kuu $aasta";
}


// Headeri sisu vastavalt lehele
$headers = [
    'homepage' => [
        'title' => 'Tere Tulemast EHNET blogisse!',
        'subtitle' => 'Siin leiad kõike, mis on seotud jätkusuutliku ja keskkonnasõbraliku ehituse ja renoveerimisega.',
        'image' => 'img/taust_homepage.png',
    ],
    'blog' => [
        'title' => 'Blogipostitused',
        'subtitle' => 'Uudised, nõuanded ja inspiratsioon jätkusuutlikust ehitusest.',
        'image' => 'img/taust_blog.png',
    ],
    'contact' => [
        'title' => 'Võta meiega ühendust',
        'subtitle' => 'Kui Sinul on küsimused, siis meil on vastused.',
        'image' => 'img/taust_contact.png',
    ],

    'post1' => [
        'title' => 'Jätkusuutlik renoveerimine:',
        'subtitle' => 'See on mõtteviis, mis arvestab looduse, inimeste ja tuleviku vajadustega.',
        'date' => kuupaevEestiKeeles(filemtime("post1.html")),
        'image' => '/ehnet/img/taust_post1.png',

    ],

    
    'post2' => [
        'title' => 'Kuidas leida soodsalt ehitusmaterjale?',
        'subtitle' => 'Ehitusmaterjalid ei pea olema kallid – avasta nipid ja kohad, kust neid leida taskukohaselt või isegi tasuta.',
        'date' => kuupaevEestiKeeles(filemtime("post2.html")),
        'image' => '/ehnet/img/taust_post2.png',
    ],

    'post3' => [
        'title' => 'Uus elu vanadele asjadele',
        'subtitle' => 'Vanadest akendest kasvuhoone? Taaskasutus ehituses aitab säästa nii loodust kui ka rahakotti.',
        'date' => kuupaevEestiKeeles(filemtime("post3.html")),
        'image' => '/ehnet/img/taust_post3.png',
    ],

    'post4' => [
        'title' => 'Loodussõbralike viimistlusmaterjalide valik',
        'subtitle' => 'Viimistlus ei pea olema mürgine – vali materjalid, mis hoiavad tervist ja keskkonda..',
        'date' => kuupaevEestiKeeles(filemtime("post4.html")),
        'image' => '/ehnet/img/taust_post4.png',
    ],

    'post5' => [
        'title' => 'Päikeseenergia koduses renoveerimises',
        'subtitle' => 'Päike ei esita arveid – targalt paigaldatud päikesepaneelid toovad säästu ja iseseisvust aastateks.',
        'date' => kuupaevEestiKeeles(filemtime("post5.html")),
        'image' => '/ehnet/img/taust_post5.png',
    ],

];

$currentHeader = $headers[$page];
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHNET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link href="/ehnet/css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>

    <!-- Menüü -->
    <div class="container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/ehnet/menu.html'; ?>

    </div>

    <!-- Dünaamiline päis -->
    <header class="masthead" style="background-image: url('<?php echo $currentHeader['image']; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1><?php echo $currentHeader['title']; ?></h1>
                    <span class="subheading"><?php echo $currentHeader['subtitle']; ?></span>

                    <?php if (isset($currentHeader['date'])): ?>
                        <p class="post-meta mt-2"><?php echo $currentHeader['date']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

  <!-- Lehe sisu -->
<div class="container">
    <?php include("$page.html"); ?>
</div>

<!-- Jalus -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ehnet/footer.html'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="..."></script>

</body>
</html>
