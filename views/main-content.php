<script>
    handleClick("#btnToCarta", "index.php?content=carta");
    handleClick("#btnToMenu", "index.php?content=menus");
</script>

<section class="imgs-container">
    <div id="carouselAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/3BurgersFire.png" class="w-100" alt="3BurgersFire" />
            </div>
            <div class="carousel-item">
                <img src="img/3BurgersLine.png" class="w-100" alt="3BurgersLine" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<nav class="second-bar">    
    <ul class="nav justify-content-center">
        <li class="nav-item"><a class="nav-link" href="index.php?content=aboutUs">Conócenos</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?content=contactUs">Contacto</a></li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?content=job">Únete a nosotros</a>
        </li>        
    </ul>
</nav>

<article class="text-article">
    <p class="text lh-lg">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
        consequatur placeat voluptas eius temporibus cum saepe nemo delectus
        fuga fugiat aspernatur exercitationem, vel magnam quasi eum molestias!
        Quisquam, voluptas repellendus. Lorem ipsum dolor sit amet consectetur,
        adipisicing elit. Similique qui ad laborum neque alias voluptates
        architecto consequatur inventore dicta maiores! Blanditiis delectus nisi
        ipsam quo. Est, officiis libero! Necessitatibus, labore?
    </p>
</article>

<section class="discover-dishes">
    <h3>DESCUBRE NUESTRA CARTA</h3>
    <button type="button" id="btnToCarta" class="btn btn-outline-danger btn-md">
        Todos nuestros platos > >
    </button>

    <div class="gallery">
        <img src="img/BaconBurger.png" alt="BaconBurger" />
        <img src="img/ChampisBurger.png" alt="MushroomsBurger" />
        <img src="img/CheeseBurger.png" alt="CheeseBurger" />
        <img src="img/HuevoBurger.png" alt="EggBurger" />
    </div>
</section>

<section class="discover">
    <h3>NUESTROS MENÚS</h3>
    <button type="button" id="btnToMenu" class="btn btn-outline-danger btn-md">
        VER MÁS > >
    </button>

    <div class="gallery">
        <img src="img/Menu1Burger.png" alt="Menu1" />
        <img src="img/Menu2Burger.png" alt="Menu2" />
    </div>
</section>