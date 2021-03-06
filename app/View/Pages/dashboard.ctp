<div class="home">
    <div class="grid">
        <div class="col-6">
            <div class="hrow">
                <a href="#" data-tab="general" class="search-tab active">Basic search</a>
                <a href="#" data-tab="pair" class="search-tab">Pair search</a>
                <div class="appSearch generalSearch active" data-page="home">
                    <form id="frmSearch" name="frmSearch" action="/Recordings/search" method="post">
                        <div id="row_0" class="hrow grid">
                            <div class="col-7">
                                <input type="text" id="searchTerm_0" name="row[0][searchTerm]" placeholder="Search term..." />
                            </div>
                            <div class="col-3">
                                <select id="searchTable_0" name="row[0][searchTable]">
                                    <option value="0">All tables</option>
                                    <option value="5">Recordings</option>
                                    <option value="1">Choirs</option>
                                    <option value="4">Directors</option>
                                    <option value="2">Composers</option>
                                    <option value="3">Compositions</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="button" id="searchAdd">+</button>
                            </div>
                        </div>
                        <div class="hrow submit-row add-pair-row-before">
                            <input type="button" class="btn" id="searchSubmit" name="searchSubmit" value="Search">
                        </div>
                    </form>
                </div>
                <div class="appSearch pairSearch" data-page="home">
                    <form id="frmPairSearch" name="frmPairSearch" action="/Recordings/search" method="post">
                        <div id="row_0" class="hrow grid">
                            <div class="col-3">
                                <select id="pairType_0" name="rowPair[0][pairType]">
                                    <option selected value="0">Pair type</option>
                                    <option value="2">Choir-Director</option>
                                    <option value="1">Composer-Composition</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="text" id="searchTerm_1_0" name="rowPair[0][searchTerm_1]" placeholder="Search term..." />
                            </div>
                            <div class="col-4">
                                <input type="text" id="searchTerm_2_0" name="rowPair[0][searchTerm_2]" placeholder="Search term..." />
                            </div>
                            <div class="col-1">
                                <button type="button" id="pairSearchAdd">+</button>
                            </div>
                        </div>
                        <div class="hrow submit-row add-pair-row-before">
                            <input type="button" class="btn" id="searchPairSubmit" name="searchPairSubmit" value="Search">
                        </div>
                    </form>
                </div>
            </div>

            <div class="hrow">
                <h4>Add/Edit records</h4>
                <div class="dashboard">
                    <ul>
                        <li><a href="/Recordings/index"><img src="../img/icon-recordings.png" alt="Add/Edit recordings" class=""><span>Recordings</span><br></a></li>
                        <li><a href="/Choirs/index"><img src="../img/icon-choirs.png" alt="Add/Edit choirs" class=""><span>Choirs</span><br></a></li>
                        <li><a href="/Directors/index"><img src="../img/icon-director.png" alt="Add/Edit directors" class=""><span>Directors</span><br></a></li>
                        <li><a href="/Composers/index"><img src="../img/icon-musician.png" alt="Add/Edit composers" class=""><span>Composers</span><br></a></li>
                        <li><a href="/Compositions/index"><img src="../img/icon-music-notes.png" alt="Add/Edit compositions" class=""><span>Compositions</span><br></a></li>
                        <li><a href="/Singers/current"><img src="../img/cd-pair_32.png" alt="Choirs-Directors" class=""><span>Choirs-Directors</span></a></li>
                        <li><a href="/Songs/current"><img src="../img/cc-pair_32.png" alt="Composers-Compositions" class=""><span>Composers-Compositions</span></a></li>
                    </ul>
                </div>
            </div>

            <?php
                if (true === $isAdmin) {
            ?>
            <div class="hrow">
                <h4>Other actions</h4>
                <div class="dashboard">
                    <ul>
                        <!--
                        <li><a href="/Records/index/1"><img src="../img/icon-link.png" alt="Link tables" class=""><span>Link <br />Modules</span></a></li>
                        <li><a href="#"><img src="../img/icon-report.png" alt="Recordings by choir" class=""><span>Custom <br />Reports</span></a></li>
                        <li><a href="#"><img src="../img/icon-search.png" alt="Compositions voicings" class=""><span>Advanced <br />Search</span></a></li>
                        <li><a href="#"><img src="../img/icon-export.png" alt="Composition recording notes" class=""><span>Export <br />Database</span></a></li>
                        -->

                            <li><a href="/Users/index"><img src="../img/icon-credentials.png"
                                                            alt="Manage Credentials" class=""><span>Manage <br/>Credentials</span></a>
                            </li>
                    </ul>
                </div>
            </div>
            <?php
                }
            ?>

        </div>
        <div class="col-6">
            <div class="hrow">
                <h4>Recordings related tables</h4>
                <div class="dashboard">
                    <ul>
                        <li><a href="/Formats/index"><img src="../img/icon-formats.png" alt="Recording formats" class=""><span>Recordings <br />Formats</span></a></li>
                        <li><a href="/Companies/index"><img src="../img/icon-cd-house.png" alt="Recording companies" class=""><span>Recordings <br />Companies</span></a></li>
                        <li><a href="/Comprecordingnotes/index"><img src="../img/icon-comp-recording-notes.png" alt="Composition recording notes" class=""><span>Recording <br />Standard Notes</span></a></li>
                        <li><a href="/Ancillarymusics/index"><img src="../img/icon-ancillary.png" alt="Ancillary music" class=""><span>Recordings <br />Ancillary Music</span></a></li>
                        <li><a href="/Presentations/index"><img src="../img/icon-presentations.png" alt="Presentations" class=""><span>Recordings <br />Presentations</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="hrow">
                <h4>Choirs/Directors related tables</h4>
                <div class="dashboard">
                    <ul>
                        <li><a href="/States/index"><img src="../img/icon-map.png" alt="Choir states" class=""><span>Choir <br />States</span></a></li>
                        <li><a href="/Countries/index"><img src="../img/icon-globe.png" alt="Choir countries" class=""><span>Choir <br />Countries</span></a></li>
                        <li><a href="/Denominations/index"><img src="../img/icon-denominations.png" alt="Choir denominations" class=""><span>Choir <br />Denominations</span></a></li>
                        <li><a href="/Vocalformats/index"><img src="../img/icon-vocal-formats.png" alt="Vocal formats" class=""><span>Choir Vocal <br />Formats</span></a></li>
                        <li><a href="/Positions/index"><img src="../img/icon-positions.png" alt="Director positions" class=""><span>Director <br />Positions</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="hrow">
                <h4>Composers/Compositions related tables</h4>
                <div class="dashboard">
                    <ul>
                        <li><a href="/Nationalities/index"><img src="../img/icon-nationalities.png" alt="Composers nationalities" class=""><span>Composers <br />Nationalities</span></a></li>
                        <li><a href="/Genres/index"><img src="../img/icon-genre.png" alt="Composition genres" class=""><span>Composition <br />Genres</span></a></li>
                        <li><a href="/Versions/index"><img src="../img/icon-comp-versions.png" alt="Composition versions" class=""><span>Composition <br />Versions</span></a></li>
                        <li><a href="/Recordingnotes/index"><img src="../img/icon-recording-notes.png" alt="Recording notes" class=""><span>Composition <br />Standard Notes</span></a></li>
                        <li><a href="/Voicings/index"><img src="../img/icon-voicings.png" alt="Compositions voicings" class=""><span>Composition <br />Voicings</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    echo $this->Html->css('app-search', null, array('inline' => false));
    echo $this->Html->script('app-search', array('inline' => false));
?>