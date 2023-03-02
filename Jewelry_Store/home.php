<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Andrew Dickman">
    <meta name="description" content="Jewler Website IT202 Unit 3">
    <title>Home - Finite Jewlers</title>
    <link rel="icon" href="images/broken infinity.jpg">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Finite Jewelers</h1>
        <img src="images/broken infinity.jpg" alt="logo" id="logo"> <br>
        <nav> <!-- Nav bar to other pages -->
            <ul id="links">
                <li id="formlinkli"><span id="formlink"><a class="navLinks" href="form.php"> Shipping Form </a></span></li>
                <li> <a class="navLinks" href="Phase2/show.php"> Inventory </a> </li>
                <li><a class="navLinks" href="contact.php"> Contact Us! </a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="description">
            <h2>Description: </h2>
            <p>
                Finite Jewelers is a newly formed jewelry store that was founded on Janurary 3rd, 2023. The purpose of Finite Jewelers is to 
                be able to sell some of the best jewelry for a lower price than you'll find elsewhere. It's purpose is for people with a finite 
                amount of money, and need to shop for jewelry on a budget. Whether it be for a as a gift for someone else or just to treat yourself,
                Finite Jewelers has got you covered to not throw your wallet into solitary confinement as soon as you swipe your card.
            </p>
        </div>
        <!-- Images of figures -->
        <div id="selection">
            <p id="selectionp">Here are some images of our current inventory:</p>
            <figure>
                <img class="rings"src="images/amethystdiamond14k ring.jpg" alt="amethyst">
                <figcaption>Fig 1. Amethyst + Diamond + 14k Gold Ring</figcaption>
            </figure>
            <figure>
                <img class="rings"src="images/sapphire diamond 14k gold ring.jpg" alt="sapphire">
                <figcaption>Fig 2. Sapphire + Diamond + 14k Gold Ring</figcaption>
            </figure>
            <figure>
                <img class="rings"src="images/white gold ruby ring.jpg" alt="ruby">
                <figcaption>Fig 3. Ruby + White Gold Ring</figcaption>
            </figure>
            <figure>
                <img class="rings"src="images/emeraldring.jpg" alt="emerald">
                <figcaption>Fig 4. Emerald Ring</figcaption>
            </figure>
        </div>
    </main>
    <footer>
        <p>Contact Info:</p>
        <p>Email: <a href="emailto:ajd93@njit.edu">ajd93@njit.edu</a></p>
    </footer>
</body>
</html>