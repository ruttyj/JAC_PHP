{extends '_layout.tpl'}
{block "title"}Find a Car{/block}
{block "header"}
    {if $header === 'head_start.tpl'}
        {include file='head_start.tpl'}
    {elseif $header = 'head_leftbar.tpl'}
        {include file='head_leftbar.tpl'}
    {elseif $header = 'head_rightbar.tpl'}
        {include file='head_rightbar.tpl'}
    {else}
        {include file='head_simple.tpl'}
    {/if}
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

            {foreach from=$answers key=key item=item}
                <article>
                    <a href="{$JACPHP}{$next_question}{$param}{$key}#banner" class="image featured">{if isset($current)}<div class='carimage{$usecover}' style="background-image: url('{$CONTENT}images/{$current}/{$key}.{$imageformat}');"></div>{/if}</a>
                    <header>
                        <h3><a href="{$JACPHP}{$next_question}{$param}{$key}#banner">{$key}</a></h3>
                    </header>
                    <p>{$description|default:'Description'}</p>							
                </article>
            {/foreach}

        </div>
    </div>
{/block}