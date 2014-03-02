{extends '_layout.tpl'}
{block "title"}Car Picker{/block}
{block "header"}{include file='head_leftbar.tpl'}{/block}
{block "body"}
    <!-- Main -->
    <div class="wrapper style1">

        <div class="container">
            <div class="row">
                <div class="4u" id="sidebar">
                    <hr class="first" />
                    <section>
                        <header>
                            <div class='carimage' style="background-image: url('{$res[0]['img']}');"></div>
                        </header>
                        <strong>Look for this car: </strong>
                        <center>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle={$res[0]['year']}+{$res[0]['maker']}+{$res[0]['model']}" class="button">eBay</a>
                            <a href="https://www.google.ca/search?q={$res[0]['year']}+{$res[0]['maker']}+{$res[0]['model']}" class="button">Google</a>
                        </center>
                    </section>
                </div>
                <div class="8u skel-cell-important" id="content">
                    <article id="main">
                        <header>
                            <h2><a href="#">{$res[0]['year']} {$res[0]['maker']} {$res[0]['model']}</a></h2>
                        </header>

                        <section>
                            <table>
                                {foreach from=$res key=key item=car}
                                    <tr>
                                        <th colspan='2' style='text-align:left;'><strong>Configuration {$key+1}: </strong></th>
                                    </tr>
                                    <tr>
                                        <th>Engine</th>
                                        <td>{$car['engine']}</td>
                                    </tr>
                                    <tr>
                                        <th>Cylinders</th>
                                        <td>{$car['cylinders']}</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td>{$car['transmission']}</td>
                                    </tr>
                                    <tr>
                                        <th>Fuel Type</th>
                                        <td>{$car['fueltype']}</td>
                                    </tr>
                                    <tr>
                                        <th>City Consumption</th>
                                        <td>{$car['citylpkw']} L/100km</td>
                                    </tr>
                                    <tr>
                                        <th>Highway Consumption</th>
                                        <td>{$car['hwylpkw']} L/100km</td>
                                    </tr>
                                    <tr>
                                        <th>Annual Consumption</th>
                                        <td>{$car['annualfuel']} L</td>
                                    </tr>
                                    <tr>
                                        <th>CO2 Emission</th>
                                        <td>{$car['emission']} g/km</td>
                                    </tr>
                                    <tr><td colspan='2'>&nbsp;</td></tr>
                                {/foreach}
                            </table>
                    </article>
                </div>
            </div>
        </div>

    </div>
{/block}