<div class="jumbotron jumbotronWithBackground" data-theme="dark" data-stickynavabove="large">
    <div class="content">
        <h1 class="centerText fontAlfaSlabOne colorOrange">Explore</h1>
        <center>
            <?php
                if ($this->userIsLoggedIn) {
                    if (strpos($_SERVER['REQUEST_URI'], "recommended") !== false) echo "<p class='fontTrebuchet'>Recommended Strategy Guides</p>";
                    else echo "<p class='fontTrebuchet'>Top Strategy Guides</p>";
                }
            ?>
        </center>
    </div>
</div>

<div class="contentContainer" data-theme="light" style="width: 75%; margin: auto;">
    <div class="content">
        <div class="spacer" data-size="small"></div>
        <center>
            <?php
                if ($this->userIsLoggedIn) {
                    if (strpos($_SERVER['REQUEST_URI'], "recommended") !== false) echo "<h5 class='fontTrebuchet'><a href='" . \URL . "user/explore/'>Switch to Top Strategy Guides</a></h5>";
                    else echo "<h5 class='fontTrebuchet'><a href='" . \URL . "user/explore/recommended/'>Switch to Recommended Strategy Guides</a></h5>";
                }
            ?>
        </center>
        
        <div class="spacer" data-size="large"></div>

        <?php
            for ($i = 0; $i < 20; $i++) {
                if (isset($this->featuredStrategyGuides[$i])) {
                    $game = new \model\Game($this->database, $this->featuredStrategyGuides[$i]->getGameId());
                    ?>
                        <div class="row" data-colcount="2">
                            <div class="column hideOnMobile">
                                <center>    
                                    <div class="positionRelative hoverOverlayContainer cursorPointer" style="width: 350px; height: 200px;" onclick="gotoLink('<?php echo \URL . "game/view/" . $game->getId() . "/"; ?>');" title="<?php echo $game->getName(); ?>">
                                        <img src="<?php echo $game->getBannerUrl(); ?>" style="width: 100%; height: 100%;"></a>
                                        <div class="hoverOverlay" style="width: 100%; height: 100%;"></div>
                                    </div>
                                </center>
                            </div>
                            <div class="column">
                                <h1 class="fontTrebuchet"><a href="<?php echo \URL; ?>game/strategyguide/<?php echo $this->featuredStrategyGuides[$i]->getId(); ?>/"><?php echo $this->featuredStrategyGuides[$i]->getTitle(); ?></a></h1>
                                <p class="fontTrebuchet" data-fontsize="small">Posted by <?php echo $this->featuredStrategyGuideAuthors[$i]->getUsername(); ?> on <?php echo date("D. F d, Y @ g:i A", $this->featuredStrategyGuides[$i]->getTimeCreated()) ?></p>
                                <p class="fontTrebuchet hideOnDesktop"><a href="<?php echo \URL; ?>game/view/<?php echo $game->getId(); ?>"><?php echo $game->getName(); ?></a></p>
                                <p class="fontVerdana" data-fontsize="medium" style="overflow-wrap: break-word;"><?php echo $this->featuredStrategyGuides[$i]->getDescriptionSnippet(250); ?></p>
                            </div>    
                        </div>
                    <?php
                }

                if (isset($this->featuredStrategyGuides[$i])) echo "<div class='spacer' data-size='large'></div><hr><div class='spacer' data-size='large'></div>";

                if (isset($this->featuredGames[$i])) {
                    ?>
                        <div class="row hideOnMobile" data-colcount="2">
                            <div class="column">
                                <h1 class="fontTrebuchet colorOrange centerHorizontalVertical">Featured Game</h1>
                            </div>
                            <div class="column">
                                <div class="positionRelative hoverOverlayContainer cursorPointer" onclick="gotoLink('<?php echo \URL . "game/view/" . $this->featuredGames[$i]->getId() . "/"; ?>');" title="<?php echo $this->featuredGames[$i]->getName(); ?>">
                                    <img src="<?php echo $this->featuredGames[$i]->getBannerUrl(); ?>" style="width: 16em; height: 8em;"></a>
                                    <div class="hoverOverlay" style="width: 16em; height: 8em;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="hideOnDesktop">
                            <h1>Featured Game: <a href="<?php echo \URL; ?>game/view/<?php echo $this->featuredGames[$i]->getId(); ?>/"><?php echo $this->featuredGames[$i]->getName(); ?></a></h1>
                        </div>
                    <?php
                }

                if (isset($this->featuredGames[$i])) echo "<div class='spacer' data-size='large'></div><hr><div class='spacer' data-size='large'></div>";
            }
        ?>
    </div>
</div>