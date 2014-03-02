{extends '_layout.tpl'}
{block "title"}Car Picker{/block}
{block "head" prepend}
    <!-- CSS Files -->
        <link type="text/css" href="http://philogb.github.io/jit/static/v20/Jit/Examples/css/base.css" rel="stylesheet" /> 
        <link type="text/css" href="http://philogb.github.io/jit/static/v20/Jit/Examples/css/Treemap.css" rel="stylesheet" />

<!--[if IE]><script language="javascript" type="text/javascript" src="../../Extras/excanvas.js"></script><![endif]-->

        <!-- JIT Library File -->
        <script language="javascript" type="text/javascript" src="http://philogb.github.io/jit/static/v20/Jit/jit-yc.js"></script>

        <!-- Example File -->
        <script language="javascript" type="text/javascript" src="{$JACPHP}include/treescript.php?field={$field}"></script>
{/block}
{block "header"}{include file='head_simple.tpl'}{/block}
{block "body"}
    <body onload="init();">
        <div id="container">

            <div id="left-container">



                <div class="text">
                    <h4>
                        Data browser   
                    </h4>    

                </div>

                <div id="id-list">
                    <table>
                        <tr>
                            <td>
                                <label for="r-sq">Squarified </label>
                            </td>
                            <td>
                                <input type="radio" id="r-sq" name="layout" checked="checked" value="left" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="r-st">Strip </label>
                            </td>
                            <td>
                                <input type="radio" id="r-st" name="layout" value="top" />
                            </td>
                            <tr>
                                <td>
                                    <label for="r-sd">SliceAndDice </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-sd" name="layout" value="bottom" />
                                </td>
                            </tr>
                    </table>
                </div>
                {*
                    <div id="id-select" style="background-color: #EEEEEE;
border: 1px solid #CCCCCC;
margin: 10px 20px 0 20px;
padding: 5px;
text-align: left;
text-indent: 2px; font-size: 16px;">
                        <form method='post'>
                        <table>
                            <tr>
                                <td>
                                    <label for="r-ann">Annual Fuel Usage </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-ann" name="layout" checked="checked" value="annual" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="r-em">Emissions </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-em" name="layout" value="emmit" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="r-hw">Highway L/100Km </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-hw" name="layout" value="high" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="r-ct">City L/100Km </label>
                                </td>
                                <td>
                                    <input type="radio" id="r-ct" name="layout" value="city" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" id="submit" class="theme button white" name="submit" value="Submit"/>
                                </td>
                            </tr>
                        </table>
                        </form>

                    </div>*}
                <a id="back" href="javascript:void(0)" class="theme button white">Go Back</a>
            </div>

            <div id="center-container">
                <div id="infovis"></div>    
            </div>

            <div id="right-container">

                <div id="inner-details"></div>

            </div>

            <div id="log"></div>
        </div>
{/block}