<?php
// Affichage des erreurs côté PHP et côté MYSQLI
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

require_once("../static/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<?php head_template(); ?>
<body id="top">

  <div class="container-loader">
    <div class="pre-loader">
        <div class="loader"></div>
        <div class="loader-bg"></div>
       </div>
      <div class="loader-content">
        <div class="count"><p>0</p></div>
        <div class="copy"><p class="ml16">TheGoodReviews</p></div>   
      </div>
    <div class="loader-2"></div>
  </div>

  <!-- **HEADER** -->
  <?php 
  if (isset($_SESSION["user"])) {
    if ($_SESSION["isAdmin"]=="yes") {
        admin_header_template();
    } else {
      user_header_template();
    }
  } else {
    visitor_header_template();
  }
  ?>

  <main>
    <article>



      <!-- **HERO** -->
      <section class="hero" id="home" aria-label="home">
        <div class="container">

          <div class="h-h1">
            TheGoodReviews
          </div>

        </div>
      </section>
      


      <!-- **HOTGAMES SLIDER** -->
      <section class="hotgames" id="hotgames" aria-labelledby="hotgame-label">
        <div class="container">

          <div class="card hotgame-card">

            <div class="card-content">

              <h2 class="headline headline-2 section-title card-title" id="hotgame-label">
                Hot games of the month
              </h2>

              <p class="card-text">
                Don't miss out on the best games this month...
              </p>

              <div class="btn-group">
                <button class="btn-icon" aria-label="previous" data-slider-prev>
                  <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                </button>

                <button class="btn-icon" aria-label="next" data-slider-next>
                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </button>
              </div>

            </div>

            <div class="slider" data-slider>
              <ul class="slider-list" data-slider-container>

              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=6" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/SKYRIM.png" width="507" height="618" loading="lazy" alt="Skyrim"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">Skyrim</span>

                  <p class="slider-subtitle">31 Articles</p>
                </div>

                </a>
              </li>


              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=21" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/ORI.png" width="507" height="618" loading="lazy" alt="Ori and the Blind Forest"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">Ori and the Blind Forest</span>

                  <p class="slider-subtitle">16 Articles</p>
                </div>

                </a>
              </li>

              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=8" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/portal2.png" width="507" height="618" loading="lazy" alt="Portal 2"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">Portal 2</span>

                  <p class="slider-subtitle">18 Articles</p>
                </div>

                </a>
              </li>

              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=25" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/SUBNAUTICA.png" width="507" height="618" loading="lazy" alt="Subnautica"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">Subnautica</span>

                  <p class="slider-subtitle">21 Articles</p>
                </div>

                </a>
              </li>

              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=22" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/TheForest.png" width="507" height="618" loading="lazy" alt="The Forest"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">The Forest</span>

                  <p class="slider-subtitle">16 Articles</p>
                </div>

                </a>
              </li>

              <li class="slider-item">
                <a href="../browser/game_details.php?game_id=14" class="slider-card">

                <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                  <img src="../../assets/images/games/CUPHEAD.png" width="507" height="618" loading="lazy" alt="Cuphead"
                  class="img-cover">
                </figure>

                <div class="slider-content">
                  <span class="slider-title">Cuphead</span>

                  <p class="slider-subtitle">18 Articles</p>
                </div>

                </a>
              </li>

              </ul>
            </div>

          </div>

        </div>
      </section>



      <!-- **FEATURED POST** -->
      <section class="section feature" aria-label="feature" id="featured">
        <div class="container">

          <h2 class="headline headline-2 section-title">
            <span class="span">Recommended Articles</span>
          </h2>

          <p class="section-text">
            Featured and highly rated articles
          </p>

          <ul class="feature-list">

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                <img src="../../assets/images/games/BANNER/ORI_banner.jpg" width="1602" height="903" loading="lazy"
                    alt="Ori and the blind forest cover" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#Platformer</a>

                      <a href="#" class="span hover-2">#Adventure</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">3 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2">
                      Blooming Feelings or Mass Deforestation?
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="../../assets/images/author-1.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Haatk</p>

                        <p class="card-subtitle">25 Nov 2023</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                  <img src="../../assets/images/games/BANNER/CELESTE_banner.jpg" width="1602" height="903" loading="lazy"
                    alt="Celeste cover" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#Platformer</a>

                      <a href="#" class="span hover-2">#Adventure</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">6 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2">
                      More Than Just A Great Platformer
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="../../assets/images/author-3.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Thaz</p>

                        <p class="card-subtitle">15 Feb 2024</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                  <img src="../../assets/images/games/BANNER/BOTW_banner.jpg" width="1602" height="903" loading="lazy"
                    alt="BOTW cover" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#Adventure</a>

                      <a href="#" class="span hover-2">#Puzzle</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">6 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2">
                      One of the finest video games ever made
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="../../assets/images/author-5.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Bob</p>

                        <p class="card-subtitle">05 Mar 2024</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                  <img src="../../assets/images/games/BANNER/NFS_MW_banner.jpg" width="1602" height="903" loading="lazy"
                    alt="Need for Speed Most Wanted cover" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#Racing</a>

                      <a href="#" class="span hover-2">#Adventure</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">2 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2">
                      Is It Truly a Bad Game?
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="../../assets/images/author-7.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Maria</p>

                        <p class="card-subtitle">12 Dec 2023</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>

            <li>
              <div class="card feature-card">

                <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                  <img src="../../assets/images/games/BANNER/NIERAUTOMATA_banner.jpg" width="1602" height="903" loading="lazy"
                    alt="Nier:Automata cover" class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="card-wrapper">
                    <div class="card-tag">
                      <a href="#" class="span hover-2">#HackNSlash</a>

                      <a href="#" class="span hover-2">#RPG</a>
                    </div>

                    <div class="wrapper">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                      <span class="span">4 mins read</span>
                    </div>
                  </div>

                  <h3 class="headline headline-3">
                    <a href="#" class="card-title hover-2">
                      A sublime and stylish action-RPG
                    </a>
                  </h3>

                  <div class="card-wrapper">

                    <div class="profile-card">
                      <img src="../../assets/images/author-5.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner">

                      <div>
                        <p class="card-title">Lee-Sin</p>

                        <p class="card-subtitle">01 Jan 2023</p>
                      </div>
                    </div>

                    <a href="#" class="card-btn">Read more</a>

                  </div>

                </div>

              </div>
            </li>

          </ul>

          <a href="#" class="btn btn-secondary">
            <span class="span">Show More Posts</span>

            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
          </a>

        </div>

        <img src="../../assets/images/shadow-3.svg" width="500" height="1500" loading="lazy" alt="" class="feature-bg">

      </section>


      
      <!-- **POPULAR TAGS** -->
      <section class="tags" aria-labelledby="tag-label">
        <div class="container">

          <h2 class="headline headline-2 section-title" id="tag-label">
            <span class="span">Popular Tags</span>
          </h2>

          <p class="section-text">
            Most searched keywords
          </p>

          <ul class="grid-list">

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag1.png" width="32" height="32" loading="lazy" alt="Adventure">

                <p class="btn-text">Adventure</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag2.png" width="32" height="32" loading="lazy" alt="Culture">

                <p class="btn-text">Platformer</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag3.png" width="32" height="32" loading="lazy" alt="Lifestyle">

                <p class="btn-text">Puzzle</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag4.png" width="32" height="32" loading="lazy" alt="Fashion">

                <p class="btn-text">Racing</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag5.png" width="32" height="32" loading="lazy" alt="Food">

                <p class="btn-text">RPG</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag6.png" width="32" height="32" loading="lazy" alt="Space">

                <p class="btn-text">MOBA</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag7.png" width="32" height="32" loading="lazy" alt="Animal">

                <p class="btn-text">Shooter</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag8.png" width="32" height="32" loading="lazy" alt="Minimal">

                <p class="btn-text">Strategy</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag9.png" width="32" height="32" loading="lazy" alt="Interior">

                <p class="btn-text">HackNSlash</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag10.png" width="32" height="32" loading="lazy" alt="Plant">

                <p class="btn-text">Indie</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag11.png" width="32" height="32" loading="lazy" alt="Nature">

                <p class="btn-text">Nature</p>
              </button>
            </li>

            <li>
              <button class="card tag-btn">
                <img src="../../assets/images/tag12.png" width="32" height="32" loading="lazy" alt="Business">

                <p class="btn-text">RTS</p>
              </button>
            </li>

          </ul>

        </div>
      </section>



      <!-- **RECENT POST** -->
      <section class="section recent-post" id="recent" aria-labelledby="recent-label">
        <div class="container">

          <div class="post-main">

            <h2 class="headline headline-2 section-title">
              <span class="span">Recent posts</span>
            </h2>

            <p class="section-text">
              Don't miss the latest trends
            </p>

            <ul class="grid-list">

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="../../assets/images/recent-post-1.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="../../assets/images/recent-post-2.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="../../assets/images/recent-post-3.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="../../assets/images/recent-post-4.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

              <li>
                <div class="recent-post-card">

                  <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                    <img src="../../assets/images/recent-post-5.jpg" width="271" height="258" loading="lazy"
                      alt="Helpful Tips for Working from Home as a Freelancer" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge">Working Tips</a>

                    <h3 class="headline headline-3 card-title">
                      <a href="#" class="link hover-2">Helpful Tips for Working from Home as a Freelancer</a>
                    </h3>

                    <p class="card-text">
                      Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner flapped lynx far that and jeepers giggled far and far
                    </p>

                    <div class="card-wrapper">
                      <div class="card-tag">
                        <a href="#" class="span hover-2"># Travel</a>

                        <a href="#" class="span hover-2"># Lifestyle</a>
                      </div>

                      <div class="wrapper">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 mins read</span>
                      </div>
                    </div>

                  </div>

                </div>
              </li>

            </ul>

            <nav aria-label="pagination" class="pagination">

              <a href="#" class="pagination-btn" aria-label="previous page">
                <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
              </a>

              <a href="#" class="pagination-btn">1</a>
              <a href="#" class="pagination-btn">2</a>
              <a href="#" class="pagination-btn">3</a>
              <a href="#" class="pagination-btn" aria-label="more page">...</a>

              <a href="#" class="pagination-btn" aria-label="next page">
                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
              </a>

            </nav>

          </div>

          <div class="post-aside grid-list">

            <div class="card aside-card">

              <h3 class="headline headline-2 aside-title">
                <span class="span">Popular Posts</span>
              </h3>

              <ul class="popular-list">

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="../../assets/images/popular-post-1.jpg" width="64" height="64" loading="lazy"
                        alt="Creating is a privilege but it’s also a gift" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Creating is a privilege but it’s also a gift</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="../../assets/images/popular-post-2.jpg" width="64" height="64" loading="lazy"
                        alt="Being unique is better than being perfect" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Being unique is better than being perfect</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="../../assets/images/popular-post-3.jpg" width="64" height="64" loading="lazy"
                        alt="Every day, in every city and town across the country" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Every day, in every city and town across the country</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="../../assets/images/popular-post-4.jpg" width="64" height="64" loading="lazy"
                        alt="Your voice, your mind, your story, your vision" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Your voice, your mind, your story, your vision</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

                <li>
                  <div class="popular-card">

                    <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                      <img src="../../assets/images/popular-post-2.jpg" width="64" height="64" loading="lazy"
                        alt="Being unique is better than being perfect" class="img-cover">
                    </figure>

                    <div class="card-content">

                      <h4 class="headline headline-4 card-title">
                        <a href="#" class="link hover-2">Being unique is better than being perfect</a>
                      </h4>

                      <div class="warpper">
                        <p class="card-subtitle">15 mins read</p>

                        <time class="publish-date" datetime="2022-04-15">15 April 2022</time>
                      </div>

                    </div>

                  </div>
                </li>

              </ul>

            </div>

            <div class="card aside-card">

              <h3 class="headline headline-2 aside-title">
                <span class="span">Last Comment</span>
              </h3>

              <ul class="comment-list">

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="../../assets/images/author-6.png" width="32" height="32" loading="lazy" alt="Jane Cooper">
                      </figure>

                      <div>
                        <p class="card-title">Jane Cooper</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="../../assets/images/author-7.png" width="32" height="32" loading="lazy" alt="Katen Doe">
                      </figure>

                      <div>
                        <p class="card-title">Katen Doe</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

                <li>
                  <div class="comment-card">

                    <blockquote class="card-text">
                      “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                      roadrunner “
                    </blockquote>

                    <div class="profile-card">
                      <figure class="profile-banner img-holder">
                        <img src="../../assets/images/author-8.png" width="32" height="32" loading="lazy"
                          alt="Barbara Cartland">
                      </figure>

                      <div>
                        <p class="card-title">Barbara Cartland</p>

                        <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                      </div>
                    </div>

                  </div>
                </li>

              </ul>

            </div>

          </div>

        </div>
      </section>



    </article>
  </main>

  <!-- **BACK-TO-TOP** -->
  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
  </a>

  <!-- **JS LINKS** -->
  <script src="../../assets/js/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="../../assets/js/load.js"></script>

  <!-- **ICONS (ionicons)** -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>