<main><div class="container">
        <div class="masonry row">
            <div class="col s12">
                <h2>Worlds of Star Faer</h2>
            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="/all-stars">Stars</a></div>
                                <div class="card-metric-value">1007</div>
                                <div class="card-metric-change increase">

                                    {{ $starLifePercent }}% of systems have life
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-blue" height="100px"></canvas>
                    </div>
                </div>

            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="/all-planets">Planets</a></div>
                                <div class="card-metric-value">12,350</div>
                                <div class="card-metric-change increase">

                                    {{ $planetLifePercent }}% have life
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-yellow" height="100px"></canvas>
                    </div>
                </div>

            </div>
            <div class="col l4 m6 s12">

                <div class="card">
                    <div class="card-stacked">
                        <div class="card-metrics card-metrics-static">
                            <div class="card-metric">
                                <div class="card-metric-title"><a href="/all-moons">Moons</a></div>
                                <div class="card-metric-value">43,457</div>
                                <div class="card-metric-change decrease">

                                    0% have life
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-chart">
                        <canvas id="flush-area-chart-pink" height="100"></canvas>
                    </div>
                </div>

            </div>

            </div>
        <div class="row">

            <all-planets></all-planets>

        </div>
    </div>
</main>







