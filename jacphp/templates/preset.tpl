{extends '_layout.tpl'}
{block "title"}Find a Car{/block}
{block "header"}
    {include file='head_simple.tpl'}
{/block}
{block "body"}
    <!-- Banner -->
    <a name="banner"></a>
    <div id="banner">
        <h2>{$question|default:'Error'}</h2>
    </div>

    <!-- Carousel -->
    <div class="carousel">
        <div class="reel">

            {foreach from=$results item=car}
                <article>
                    <a href="{$JACPHP}result.php?cartype={$car['cartype']}&maker={$car['maker']}&model={$car['model']}&year={$car['year']}#banner" class="image featured"><div class='carimage' style="background-image: url('{$car['img']}');"></div></a>
                        <header>
                            <h4><a href="#">{$car['year']} {$car['maker']} {$car['model']}</a></h4>
                        </header>
                        <p>{$description|default:'Description'}</p>						
                </article>
            {/foreach}

        </div>
    </div>
{/block}