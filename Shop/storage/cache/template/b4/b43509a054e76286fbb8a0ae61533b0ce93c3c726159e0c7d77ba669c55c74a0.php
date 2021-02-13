<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* extension/shipping/enviaya.twig */
class __TwigTemplate_fa900d057c6988b770c4db0a1226718a6c125d6e55d3f5f94bdb2407e01131e4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"pull-right\">
                <button type=\"submit\" form=\"form-shipping\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["save"] ?? null);
        echo "\"
                        class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
                <a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i
                        class=\"fa fa-reply\"></i></a>
            </div>
            <h1>";
        // line 11
        echo ($context["heading_title"] ?? null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 14
            echo "                    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 14);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 14);
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 21
            echo "            <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo $context["error"];
            echo "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "        <form action=\"";
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-shipping\"
              class=\"form-horizontal\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 29
        echo ($context["access_configuration"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 33
        echo ($context["enabled"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_status\" id=\"input-status\" class=\"form-control\">
                                ";
        // line 36
        if (($context["shipping_enviaya_status"] ?? null)) {
            // line 37
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 38
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 40
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 41
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 43
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-sort-order\">";
        // line 47
        echo ($context["sort_order"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"shipping_enviaya_sort_order\"
                                   value=\"";
        // line 50
        echo ($context["shipping_enviaya_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\"
                                   class=\"form-control\"/>
                        </div>
                    </div>
                    <hr>
                    <h4>";
        // line 55
        echo ($context["api_key_configuration"] ?? null);
        echo "</h4>

                    <div class=\"form-group\" style=\"border:none;\" id=\"apikey-group\">
                        <label class=\"col-sm-2 control-label\" for=\"input-apikey\"><span data-toggle=\"tooltip\"
                                                                                       title=\"";
        // line 59
        echo ($context["api_key_help"] ?? null);
        echo "\">";
        echo ($context["api_key"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"shipping_enviaya_apikey\" value=\"";
        // line 61
        echo ($context["shipping_enviaya_apikey"] ?? null);
        echo "\"
                                   id=\"input-apikey\" class=\"form-control\"/>
                            <span data-toggle=\"comment\" title=\"";
        // line 63
        echo ($context["help_apikey"] ?? null);
        echo "\">";
        echo ($context["comment_apikey"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\" id=\"test-apikey-group\">
                        <label class=\"col-sm-2 control-label\" for=\"input-test-apikey\"><span data-toggle=\"tooltip\"
                                                                                            title=\"";
        // line 68
        echo ($context["api_key_help"] ?? null);
        echo "\">";
        echo ($context["test_api_key"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"shipping_enviaya_test_apikey\"
                                   value=\"";
        // line 71
        echo ($context["shipping_enviaya_test_apikey"] ?? null);
        echo "\" id=\"input-test-apikey\"
                                   class=\"form-control\"/>
                            <span data-toggle=\"comment\" title=\"";
        // line 73
        echo ($context["help_test_apikey"] ?? null);
        echo "\">";
        echo ($context["comment_test_apikey"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-test-mode\"><span data-toggle=\"tooltip\"
                                                                                          title=\"";
        // line 78
        echo ($context["test_mode_help"] ?? null);
        echo "\">";
        echo ($context["enable_test_mode"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_test_mode\" id=\"input-test-mode\" class=\"form-control\">
                                ";
        // line 81
        if (($context["shipping_enviaya_test_mode"] ?? null)) {
            // line 82
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 83
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 85
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 86
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 88
        echo "                            </select>
                        </div>
                    </div>
                    <hr>
                    <h4>";
        // line 92
        echo ($context["billing_account"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-enviaya-account\"><span data-toggle=\"tooltip\"
                                                                                                title=\"";
        // line 95
        echo ($context["billing_account_help"] ?? null);
        echo "\">";
        echo ($context["billing_account"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_account\" id=\"input-enviaya-account\" class=\"form-control\">
                                ";
        // line 98
        if ((twig_length_filter($this->env, ($context["enviaya_accounts"] ?? null)) != 1)) {
            // line 99
            echo "                                    <option value=\"\" disabled=\"disabled\"
                                            selected=\"selected\">";
            // line 100
            echo ($context["select_account"] ?? null);
            echo "</option>
                                ";
        }
        // line 102
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["enviaya_accounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 103
            echo "                                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["account"], "value", [], "any", false, false, false, 103) == ($context["shipping_enviaya_account"] ?? null))) {
                // line 104
                echo "                                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["account"], "value", [], "any", false, false, false, 104);
                echo "\"
                                                selected=\"selected\">";
                // line 105
                echo twig_get_attribute($this->env, $this->source, $context["account"], "label", [], "any", false, false, false, 105);
                echo "</option>
                                    ";
            } else {
                // line 107
                echo "                                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["account"], "value", [], "any", false, false, false, 107);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["account"], "label", [], "any", false, false, false, 107);
                echo "</option>
                                    ";
            }
            // line 109
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <script type=\"text/javascript\">
                function ajaxAccount(api_key) {
                    \$.ajax({
                        url: 'https://enviaya.com.mx/api/v1/get_accounts?api_key=' + api_key,
                        success: function (data) {
                            \$('#input-enviaya-account').empty();
                            \$('#input-enviaya-account').append('<option disabled=\"disabled\" selected=selected>";
        // line 122
        echo ($context["select_account"] ?? null);
        echo "</option>');

                            data.enviaya_accounts.forEach(function (element) {
                                \$('#input-enviaya-account').append('<option value=' + element.account + ' selected=selected>' + element.alias + ' (' + element.account + ')</option>');
                            });
                        },
                        error: function () {
                            \$('#input-enviaya-account').empty();
                            \$('#input-enviaya-account').append('<option disabled=\"disabled\" selected=selected>";
        // line 130
        echo ($context["select_account"] ?? null);
        echo "</option>');
                        }
                    });
                }

                function ajaxDirection(api_key) {
                    \$.ajax({
                        url: 'https://enviaya.com.mx/api/v1/directions?api_key=' + api_key,
                        success: function (html) {
                            \$('#input-origin-direction').empty();
                            \$('#input-origin-direction').append('<option disabled=\"disabled\" selected=selected>";
        // line 140
        echo ($context["select_sender"] ?? null);
        echo "</option>');
                            var json = '';
                            html.directions.forEach(function (element) {
                                element.id = element.id.toString();
                                var em = new Object();
                                em.full_name = element.full_name
                                em.company = element.company
                                em.phone = element.phone
                                em.email = element.email
                                em.direction_1 = element.direction_1
                                em.direction_2 = element.direction_2
                                em.neighborhood = element.neighborhood
                                em.district = element.district
                                em.postal_code = element.postal_code
                                em.city = element.city
                                em.state_code = element.state_code
                                em.country_code = element.country_code
                                json = JSON.stringify(em);
                                json = json.normalize();
                                json = toASCII(json);
                                \$('#input-origin-direction').append('<option value=' + btoa(json) + '>' + element.full_name + '</option>');
                            });
                        },
                        error: function () {
                            \$('#input-origin-direction').empty();
                            \$('#input-origin-direction').append('<option disabled=\"disabled\" selected=selected>";
        // line 165
        echo ($context["select_sender"] ?? null);
        echo "</option>');
                        }
                    });
                }

                function toASCII(string) {
                    var toFind = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'];
                    var toRepl = ['a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'];

                    for (var i = 0; i < toFind.length; i++) {
                        var arr = string.split(toFind[i]);
                        string = arr.join(toRepl[i]);
                    }

                    var arr = string.split('null');
                    string = arr.join('\\\"\\\"');
                    return string;
                }

                function apiKey() {
                    var test_mode = \$('#input-test-mode').val();
                    if (test_mode == \"1\") {
                        var result = \$('#input-test-apikey').val();
                    } else {
                        var result = \$('#input-apikey').val();
                    }

                    ajaxAccount(result);
                    ajaxDirection(result);
                    \$('#direction-preview').empty();
                }

                \$('#input-apikey').bind('change', function () {
                    apiKey();
                });

                \$('#input-test-apikey').bind('change', function () {
                    apiKey();
                });

                \$('#input-test-mode').bind('change', function () {
                    apiKey();
                });
            </script>

            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 212
        echo ($context["rating_configuration"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 215
        echo ($context["rating_configuration"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-enable-rating\">";
        // line 217
        echo ($context["enable_rating"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_enable_rating\" id=\"input-enable-rating\" class=\"form-control\">
                                ";
        // line 220
        if (($context["shipping_enviaya_enable_rating"] ?? null)) {
            // line 221
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 222
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 224
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 225
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 227
        echo "                            </select>
                            <small>";
        // line 228
        echo ($context["remove_rating_zones_hint"] ?? null);
        echo "</small>
                        </div>
                    </div>
                    <hr>
                    <h4>";
        // line 232
        echo ($context["shipping_services_display"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-title\"><span data-toggle=\"tooltip\"
                                                                                      title=\"";
        // line 235
        echo ($context["rates_title"] ?? null);
        echo "\">";
        echo ($context["title"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"shipping_enviaya_title\" value=\"";
        // line 237
        echo ($context["shipping_enviaya_title"] ?? null);
        echo "\"
                                   id=\"input-title\" class=\"form-control\"/>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-shipping-carrier-name\"><span
                                data-toggle=\"tooltip\" title=\"";
        // line 243
        echo ($context["carrier_name_help"] ?? null);
        echo "\">";
        echo ($context["carrier_name"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_shipping_carrier_name\" id=\"input-shipping-carrier-name\"
                                    class=\"form-control input-shipping-carrier-name\">
                                ";
        // line 247
        if ((($context["shipping_enviaya_shipping_carrier_name"] ?? null) == 0)) {
            // line 248
            echo "                                    <option value=\"0\" selected=\"selected\">";
            echo ($context["carrier_name_option_1"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 250
            echo "                                    <option value=\"0\">";
            echo ($context["carrier_name_option_1"] ?? null);
            echo "</option>
                                ";
        }
        // line 252
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_carrier_name"] ?? null) == 1)) {
            // line 253
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["carrier_name_option_2"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 255
            echo "                                    <option value=\"1\">";
            echo ($context["carrier_name_option_2"] ?? null);
            echo "</option>
                                ";
        }
        // line 257
        echo "                            </select>
                            <span data-toggle=\"comment\"></span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-shipping-service-name\"><span
                                data-toggle=\"tooltip\" title=\"";
        // line 263
        echo ($context["service_name_help"] ?? null);
        echo "\">";
        echo ($context["service_name"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_shipping_service_name\" id=\"input-shipping-service-name\"
                                    class=\"form-control\">
                                ";
        // line 267
        if ((($context["shipping_enviaya_shipping_service_name"] ?? null) == 0)) {
            // line 268
            echo "                                    <option value=\"0\" selected=\"selected\">";
            echo ($context["service_name_1"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 270
            echo "                                    <option value=\"0\">";
            echo ($context["service_name_1"] ?? null);
            echo "</option>
                                ";
        }
        // line 272
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_service_name"] ?? null) == 1)) {
            // line 273
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["service_name_2"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 275
            echo "                                    <option value=\"1\">";
            echo ($context["service_name_2"] ?? null);
            echo "</option>
                                ";
        }
        // line 277
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_service_name"] ?? null) == 2)) {
            // line 278
            echo "                                    <option value=\"2\" selected=\"selected\">";
            echo ($context["service_name_3"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 280
            echo "                                    <option value=\"2\">";
            echo ($context["service_name_3"] ?? null);
            echo "</option>
                                ";
        }
        // line 282
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_service_name"] ?? null) == 3)) {
            // line 283
            echo "                                    <option value=\"3\" selected=\"selected\">";
            echo ($context["service_name_4"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 285
            echo "                                    <option value=\"3\">";
            echo ($context["service_name_4"] ?? null);
            echo "</option>
                                ";
        }
        // line 287
        echo "                            </select>
                            <span data-toggle=\"comment\"></span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-shipping-delivery-time\"><span
                                data-toggle=\"tooltip\"
                                title='";
        // line 294
        echo ($context["shipping_delivery_time_help"] ?? null);
        echo "'>";
        echo ($context["shipping_delivery_time"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_shipping_delivery_time\" id=\"input-shipping-delivery-time\"
                                    class=\"form-control input-shipping-delivery-time\">
                                ";
        // line 298
        if ((($context["shipping_enviaya_shipping_delivery_time"] ?? null) == 0)) {
            // line 299
            echo "                                    <option value=\"0\" selected=\"selected\">";
            echo ($context["show_estimated_delivery_date"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 301
            echo "                                    <option value=\"0\">";
            echo ($context["show_estimated_delivery_date"] ?? null);
            echo "</option>
                                ";
        }
        // line 303
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_delivery_time"] ?? null) == 1)) {
            // line 304
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["show_transit_time"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 306
            echo "                                    <option value=\"1\">";
            echo ($context["show_transit_time"] ?? null);
            echo "</option>
                                ";
        }
        // line 308
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_delivery_time"] ?? null) == 2)) {
            // line 309
            echo "                                    <option value=\"2\" selected=\"selected\">";
            echo ($context["do_not_show_delivery_time"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 311
            echo "                                    <option value=\"2\">";
            echo ($context["do_not_show_delivery_time"] ?? null);
            echo "</option>
                                ";
        }
        // line 313
        echo "                            </select>
                            <span data-toggle=\"comment\"></span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-shipping-services-design\"><span
                                data-toggle=\"tooltip\"
                                title='";
        // line 320
        echo ($context["shipping_services_design_help"] ?? null);
        echo "'>";
        echo ($context["shipping_services_design"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_shipping_services_design\" id=\"input-shipping-services-design\"
                                    class=\"form-control\">
                                ";
        // line 324
        if (($context["shipping_enviaya_shipping_services_design"] ?? null)) {
            // line 325
            echo "                                    <option value=\"1\"
                                            selected=\"selected\">";
            // line 326
            echo ($context["default_shipping_services_design"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 327
            echo ($context["advanced_shipping_services_design"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 329
            echo "                                    <option value=\"1\">";
            echo ($context["default_shipping_services_design"] ?? null);
            echo "</option>
                                    <option value=\"0\"
                                            selected=\"selected\">";
            // line 331
            echo ($context["advanced_shipping_services_design"] ?? null);
            echo "</option>
                                ";
        }
        // line 333
        echo "                            </select>
                            <span data-toggle=\"comment\"></span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\" id=\"group-display-carrier-logo\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-display-carrier-logo\">";
        // line 339
        echo ($context["display_carrier_logo"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_display_carrier_logo\" id=\"input-display-carrier-logo\"
                                    class=\"form-control\">
                                ";
        // line 343
        if (($context["shipping_enviaya_display_carrier_logo"] ?? null)) {
            // line 344
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 345
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 347
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 348
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 350
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\" id=\"group-services-display\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-shipping-services-display\">";
        // line 355
        echo ($context["shipping_services_display"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_shipping_services_display\"
                                    id=\"input-shipping-services-display\" class=\"form-control\">
                                ";
        // line 359
        if ((($context["shipping_enviaya_shipping_services_display"] ?? null) == 0)) {
            // line 360
            echo "                                    <option value=\"0\"
                                            selected=\"selected\">";
            // line 361
            echo ($context["advanced_shipping_services_design_1"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 363
            echo "                                    <option value=\"0\">";
            echo ($context["advanced_shipping_services_design_1"] ?? null);
            echo "</option>
                                ";
        }
        // line 365
        echo "                                ";
        if ((($context["shipping_enviaya_shipping_services_display"] ?? null) == 1)) {
            // line 366
            echo "                                    <option value=\"1\"
                                            selected=\"selected\">";
            // line 367
            echo ($context["advanced_shipping_services_design_2"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 369
            echo "                                    <option value=\"1\">";
            echo ($context["advanced_shipping_services_design_2"] ?? null);
            echo "</option>
                                ";
        }
        // line 371
        echo "                            </select>
                            <span data-toggle=\"comment\"></span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\" id=\"group-by-carrier\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-group-by-carrier\">";
        // line 377
        echo ($context["group_by_carrier"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_group_by_carrier\" id=\"input-group-by-carrier\"
                                    class=\"form-control\">
                                ";
        // line 381
        if (($context["shipping_enviaya_group_by_carrier"] ?? null)) {
            // line 382
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 383
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 385
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 386
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 388
        echo "                            </select>
                        </div>
                    </div>
                    <script type=\"text/javascript\">
                        function getExample(element) {
                            switch (element.value) {
                                case '0':
                                    \$(\"#group-display-carrier-logo\").show();
                                    \$(\"#group-by-carrier\").show();
                                    \$(\"#group-services-display\").show();
                                    return '";
        // line 398
        echo ($context["advanced_shipping_services_design_warning"] ?? null);
        echo "';
                                case '1':
                                    \$(\"#group-display-carrier-logo\").hide();
                                    \$(\"#group-by-carrier\").hide();
                                    \$(\"#group-services-display\").hide();
                                    return '<span style=\"display: block;\">Example:</span><span id=\"example_carrier_name\">Redpack - </span><span>Express</span><span class=\"delivery_time_1\"> - 14/11/2017</span><span class=\"delivery_time_2\"> - 1 day</span><span> (\$ 156.43)</span>';
                            }
                        }

                        let select = \$('#input-shipping-services-design').get(0);
                        \$(select).next().html(getExample(select));
                        \$('#input-shipping-services-design').bind('change', function () {
                            \$(this).next().html(getExample(this));
                            shippingDeliveryTime();
                        });

                        function shippingCarrierName() {
                            if (\$('.input-shipping-carrier-name').val() == \"0\") {
                                \$('#example_carrier_name').hide();
                            } else {
                                \$('#example_carrier_name').show();
                            }
                        }

                        \$('.input-shipping-carrier-name').bind('change', function () {
                            shippingCarrierName();
                        });

                        function shippingDeliveryTime() {
                            if (\$('.input-shipping-delivery-time').val() == \"0\") {
                                \$('.delivery_time_1').show();
                                \$('.delivery_time_2').hide();
                                \$('.br').show();
                            } else if (\$('.input-shipping-delivery-time').val() == \"1\") {
                                \$('.delivery_time_1').hide();
                                \$('.delivery_time_2').show();
                                \$('.br').show();
                            } else {
                                \$('.delivery_time_1').hide();
                                \$('.delivery_time_2').hide();
                                \$('.br').hide();
                            }
                        }

                        \$('.input-shipping-delivery-time').bind('change', function () {
                            shippingDeliveryTime();
                        });

                        function getExampleDisplay(element) {
                            switch (element.value) {
                                case '0':
                                    return '<span style=\"display: block; margin-bottom: 5px;\">Example:</span><img id=\"display-logo\" style=\"vertical-align: middle; max-width: 100px; max-height: 40px; margin-right: 10px;\" src=\"https://enviaya-public.s3-us-west-1.amazonaws.com/images/ups.png\" alt=\"\"><div style=\"display: inline-block; vertical-align: middle;\"><span id=\"example_carrier_name\">Redpack - </span><span id=\"example_service_name\">Entrega en 2 días</span> <span class=\"br\"> - </span> <span class=\"delivery_time_1\" style=\"display: none;\"> 14/11/2017</span><span class=\"delivery_time_2\" style=\"display: none;\"> 1 day</span><span> (\$ 156.43)</span></div>';
                                case '1':
                                    return '<span style=\"display: block; margin-bottom: 5px;\">Example:</span><img id=\"display-logo\" style=\"vertical-align: middle; max-width: 100px; max-height: 40px; margin-right: 10px;\" src=\"https://enviaya-public.s3-us-west-1.amazonaws.com/images/ups.png\" alt=\"\"><div style=\"display: inline-block; vertical-align: middle;\"><span id=\"example_carrier_name\">Redpack - </span><span id=\"example_service_name\">Entrega en 2 días</span><span class=\"br\"></br></span><span class=\"delivery_time_1\" style=\"display: none;\"> 14/11/2017</span><span class=\"delivery_time_2\" style=\"display: none;\"> 1 day</span><span> (\$ 156.43)</span></div>';
                            }
                        }

                        let display = \$('#input-shipping-services-display').get(0);
                        \$(display).next().html(getExampleDisplay(display));
                        \$('#input-shipping-services-display').bind('change', function () {
                            \$(this).next().html(getExampleDisplay(this));
                            shippingDeliveryTime();
                            serviceName();
                            displayLogo();
                        });

                        function displayLogo() {
                            if (\$('#input-display-carrier-logo').val() == \"1\") {
                                \$('#display-logo').show();
                            } else {
                                \$('#display-logo').hide();
                            }
                        }

                        \$('#input-display-carrier-logo').bind('change', function () {
                            displayLogo();
                        });

                        function serviceName() {
                            if (\$('#input-shipping-service-name').val() == \"0\") {
                                \$('#example_service_name').html('Entrega en 2 días');
                            } else if (\$('#input-shipping-service-name').val() == \"1\") {
                                \$('#example_service_name').html('Económico');
                            } else if (\$('#input-shipping-service-name').val() == \"2\") {
                                \$('#example_service_name').html('Express');
                            } else {
                                \$('#example_service_name').html('');
                                \$('.br').hide();
                            }
                        }

                        \$('#input-shipping-service-name').bind('change', function () {
                            serviceName();
                        });

                        \$(document).ready(function () {
                            shippingDeliveryTime();
                            shippingCarrierName();
                            displayLogo();
                            serviceName();
                        });

                    </script>
                    <hr>
                    <p>";
        // line 502
        echo ($context["custom_design_text"] ?? null);
        echo "</p>
                    <hr>
                    <h4>";
        // line 504
        echo ($context["free_shipping"] ?? null);
        echo "</h4>
                    <p>";
        // line 505
        echo ($context["free_shipping_text"] ?? null);
        echo "</p>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-as-defined-price\">";
        // line 508
        echo ($context["as_defined_price"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_as_defined_price\" id=\"input-as-defined-price\"
                                    class=\"form-control\">
                                ";
        // line 512
        if ((($context["shipping_enviaya_as_defined_price"] ?? null) == 0)) {
            // line 513
            echo "                                    <option value=\"0\" selected=\"selected\">";
            echo ($context["do_not_show_price"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 515
            echo "                                    <option value=\"0\">";
            echo ($context["do_not_show_price"] ?? null);
            echo "</option>
                                ";
        }
        // line 517
        echo "                                ";
        if ((($context["shipping_enviaya_as_defined_price"] ?? null) == 1)) {
            // line 518
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["show_price_as"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 520
            echo "                                    <option value=\"1\">";
            echo ($context["show_price_as"] ?? null);
            echo "</option>
                                ";
        }
        // line 522
        echo "                            </select>
                        </div>
                    </div>
                    <hr>
                    <h4>";
        // line 526
        echo ($context["contingency_shipping_services"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-enable-contingency-shipping-services\"><span
                                data-toggle=\"tooltip\"
                                title=\"";
        // line 530
        echo ($context["contingency_services_help"] ?? null);
        echo "\">";
        echo ($context["enable_contingency_shipping_services"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_enable_contingency_shipping_services\"
                                    id=\"input-enable-contingency-shipping-services\" class=\"form-control\">
                                ";
        // line 534
        if (($context["shipping_enviaya_enable_contingency_shipping_services"] ?? null)) {
            // line 535
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 536
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 538
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 539
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 541
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group contingency-services\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-contingency-flat-standard\">";
        // line 546
        echo ($context["contingency_standard_shipping"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_contingency_standard_shipping\"
                                    id=\"input-contingency-flat-standard\" class=\"form-control\">
                                ";
        // line 550
        if (($context["shipping_enviaya_contingency_standard_shipping"] ?? null)) {
            // line 551
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 552
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 554
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 555
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 557
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group contingency-services\" id=\"flat_standard\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-flat-standard\"><span data-toggle=\"tooltip\"
                                                                                              title=\"";
        // line 562
        echo ($context["contingency_standard_rate_help"] ?? null);
        echo "\">";
        echo ($context["contingency_standard_rate"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-9\">
                            <input type=\"number\" name=\"shipping_enviaya_flat_standard\"
                                   value=\"";
        // line 565
        echo ($context["shipping_enviaya_flat_standard"] ?? null);
        echo "\" id=\"input-flat-standard\"
                                   class=\"form-control\"/>
                        </div>
                        <div class=\"col-sm-1 control-label\">
                            ";
        // line 569
        echo ($context["shipping_enviaya_currency"] ?? null);
        echo "
                        </div>
                    </div>
                    <div class=\"form-group contingency-services\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-contingency-flat-express\">";
        // line 574
        echo ($context["contingency_express_shipping"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_contingency_express_shipping\"
                                    id=\"input-contingency-flat-express\" class=\"form-control\">
                                ";
        // line 578
        if (($context["shipping_enviaya_contingency_express_shipping"] ?? null)) {
            // line 579
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 580
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 582
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 583
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 585
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group contingency-services\" id=\"flat-express\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-flat-express\"><span data-toggle=\"tooltip\"
                                                                                             title=\"";
        // line 590
        echo ($context["contingency_express_rate_help"] ?? null);
        echo "\">";
        echo ($context["contingency_express_rate"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-9\">
                            <input type=\"number\" name=\"shipping_enviaya_flat_express\"
                                   value=\"";
        // line 593
        echo ($context["shipping_enviaya_flat_express"] ?? null);
        echo "\" id=\"input-flat-express\"
                                   class=\"form-control\"/>
                        </div>
                        <div class=\"col-sm-1 control-label\">
                            ";
        // line 597
        echo ($context["shipping_enviaya_currency"] ?? null);
        echo "
                        </div>
                    </div>
                    <script type=\"text/javascript\">
                        function contingencyShippingServices() {
                            if (\$('#input-enable-contingency-shipping-services').val() == \"1\") {
                                \$('.contingency-services').show();

                                if (\$('#input-contingency-flat-standard').val() == \"1\") {
                                    \$('#flat_standard').show();
                                } else {
                                    \$('#flat_standard').hide();
                                }

                                if (\$('#input-contingency-flat-express').val() == \"1\") {
                                    \$('#flat-express').show();
                                } else {
                                    \$('#flat-express').hide();
                                }
                            } else {
                                \$('.contingency-services').hide();
                            }
                        }

                        \$(document).ready(function () {
                            contingencyShippingServices();
                        });

                        \$('#input-enable-contingency-shipping-services').on('change', function () {
                            contingencyShippingServices();
                        });

                        \$('#input-contingency-flat-standard').on('change', function () {
                            contingencyShippingServices();
                        });

                        \$('#input-contingency-flat-express').on('change', function () {
                            contingencyShippingServices();
                        });
                    </script>
                    <hr>
                    <h4>";
        // line 638
        echo ($context["additional_account_configurations_title"] ?? null);
        echo "</h4>
                    <p>";
        // line 639
        echo ($context["additional_account_configurations_text"] ?? null);
        echo "</p>
                    <hr>
                    <h4>";
        // line 641
        echo ($context["carrier_and_services_configuration"] ?? null);
        echo "</h4>
                    <p>";
        // line 642
        echo ($context["carrier_and_services_configuration_help"] ?? null);
        echo "</p>
                    <hr>
                    <h4>";
        // line 644
        echo ($context["subsidies_title"] ?? null);
        echo "</h4>
                    <p>";
        // line 645
        echo ($context["subsidies_text"] ?? null);
        echo "</p>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 650
        echo ($context["advanced_configuration"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 653
        echo ($context["advanced_configuration"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\"
                               for=\"input-send-shipment-notifications\"><span data-toggle=\"tooltip\"
                                                                             title=\"";
        // line 657
        echo ($context["send_shipment_notifications_help"] ?? null);
        echo "\">";
        echo ($context["send_shipment_notifications"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_send_shipment_notifications\"
                                    id=\"input-send-shipment-notifications\" class=\"form-control\">
                                ";
        // line 661
        if (($context["shipping_enviaya_send_shipment_notifications"] ?? null)) {
            // line 662
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 663
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 665
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 666
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 668
        echo "                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 675
        echo ($context["excluded_zones"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 678
        echo ($context["excluded_zones_title"] ?? null);
        echo "</h4>
                    <p>";
        // line 679
        echo ($context["excluded_zones_title_help"] ?? null);
        echo "</p>
                    <hr>
                    <table class=table>
                        <thead>
                        <tr>
                            <th scope=col>
                                <label class='control-label'>
                           <span data-original-title='";
        // line 686
        echo ($context["zone_name_help"] ?? null);
        echo "' data-html='true'
                                 data-toggle='tooltip' class='label-tooltip'
                                 id='e_zone_name'>";
        // line 688
        echo ($context["zone_name"] ?? null);
        echo "</span>
                                </label>
                            </th>
                            <th scope=col>
                                <label class='control-label'>
                           <span data-original-title='";
        // line 693
        echo ($context["zone_regions_help"] ?? null);
        echo "' data-html='true'
                                 data-toggle='tooltip' class='label-tooltip'
                                 id='e_zone_regions'>";
        // line 695
        echo ($context["zone_regions"] ?? null);
        echo "</span>
                                </label>
                            </th>
                            <th scope=col>
                                <label class='control-label'>
                           <span data-original-title=\"";
        // line 700
        echo ($context["zone_regions_list_help"] ?? null);
        echo "\" data-html='true'
                                 data-toggle='tooltip' class='label-tooltip'
                                 id='e_postcodes'>";
        // line 702
        echo ($context["excluded_zones"] ?? null);
        echo "</span>
                                </label>
                            </th>
                            <th scope=col>
                                <label class='control-label'>";
        // line 706
        echo ($context["delete"] ?? null);
        echo "</label>
                            </th>
                        </tr>
                        </thead>
                        <tbody class='hasEmpty calculated-row'>
                        </tbody>
                    </table>
                    <div class='text-right'>
                        <a class='btn btn-default add_row '>";
        // line 714
        echo ($context["add_zone"] ?? null);
        echo "</a>
                    </div>
                    <input type=\"hidden\" name=\"shipping_enviaya_zone_data\" value=\"";
        // line 716
        echo ($context["shipping_enviaya_zone_data"] ?? null);
        echo "\"
                           id=\"shipping_enviaya_zone_data\">
                    <script>
                        function createRow() {
                            const _tmp = document.createElement('tbody');
                            _tmp.innerHTML = `<td><input type=text name=excluded_zone_name[] class=\"form-control\" placeholder=\"";
        // line 721
        echo ($context["zone_name"] ?? null);
        echo "\" ></td>
                                              <td><select name=\"excluded_zone_locations[]\" class=\"form-control\" multiple></select></td>
                                              <td><textarea rows=\"4\" name=\"excluded_zone_postcodes[]\" class=\"form-control\" placeholder=\"";
        // line 723
        echo ($context["zone_regions_list_placeholder"] ?? null);
        echo "\"></textarea></td>
                                              <td><a data-delete=\"\" class=\"btn btn-default delete\">";
        // line 724
        echo ($context["delete"] ?? null);
        echo "</a></td>`;
                            return _tmp.firstElementChild;
                        }

                        function bindRowHandlers(row) {
                            const excluded_zone_name = row.querySelector('input[name=\"excluded_zone_name[]\"]');
                            const excluded_zone_locations = row.querySelector('select[name=\"excluded_zone_locations[]\"]');
                            const excluded_zone_postcodes = row.querySelector('textarea[name=\"excluded_zone_postcodes[]\"]');
                        }

                        function calculator() {
                            const button = document.querySelector('.add_row');
                            const rowsContainer = document.querySelector('.hasEmpty')
                            const rows = Array.from(rowsContainer.querySelectorAll('.calculated-row'));
                            rows.forEach(bindRowHandlers);
                            button.addEventListener('click', () => {
                                const newRow = createRow();
                                bindRowHandlers(newRow);
                                var countryCodeOptions = ";
        // line 742
        echo ($context["countries_json"] ?? null);
        echo ",
                                    select = newRow.querySelector('select[name=\"excluded_zone_locations[]\"]'),
                                    countryCodeOptions = JSON.parse(JSON.stringify(countryCodeOptions));

                                for (property in countryCodeOptions) {
                                    select.options[select.options.length] = new Option(countryCodeOptions[property].name, countryCodeOptions[property].value);
                                }
                                rows.push(rowsContainer.appendChild(newRow));
                            })
                        }
                        calculator();

                        \$(document).on('click', '[data-delete]', function () {
                            \$(this).closest('tr').remove()
                            data = [];
                            var ul = \$('.hasEmpty tr');

                            ul.each(function () {
                                var inputs = \$(this).find('[name]');
                                var rowData = {};

                                inputs.each(function () {
                                    var name = \$(this).attr('name');
                                    var value = \$(this).val();

                                    rowData[name] = value;
                                });
                                data.push(rowData);
                            });
                            var table = (JSON.stringify(data));

                            \$('#shipping_enviaya_zone_data').val(table);
                        });

                        \$(document).on('change', '.table', function () {
                            data = [];
                            var ul = \$('.hasEmpty tr');

                            ul.each(function () {
                                var inputs = \$(this).find('[name]');
                                var rowData = {};

                                inputs.each(function () {
                                    var name = \$(this).attr('name');
                                    var value = \$(this).val();

                                    rowData[name] = value;
                                });
                                data.push(rowData);
                            });
                            var table = (JSON.stringify(data));

                            \$('#shipping_enviaya_zone_data').val(table);
                        });

                        function option(value) {
                            var countryCodeOptions = ";
        // line 798
        echo ($context["countries_json"] ?? null);
        echo ",
                                countryCodeOptions = JSON.parse(JSON.stringify(countryCodeOptions)),
                                option = '';

                            for (property in countryCodeOptions) {

                                if (value && value.includes(countryCodeOptions[property].value)) {
                                    option += '<option value=' + countryCodeOptions[property].value + ' selected=selected >' + countryCodeOptions[property].name + '</option>'
                                } else {
                                    option += '<option value=' + countryCodeOptions[property].value + '>' + countryCodeOptions[property].name + '</option>'
                                }
                            }

                            return option;
                        }

                        function fillTableFromLS() {
                            var zones_data = \$('#shipping_enviaya_zone_data').val(),
                                localValue = null;
                            if (zones_data.length != 0) {
                                localValue = JSON.parse(\$('#shipping_enviaya_zone_data').val());
                            }
                            if (localValue) {
                                var countSongs = localValue.length;
                                var tables = '';
                                for (var i = 0; i < countSongs; i++) {
                                    var excluded_zone_name = localValue[i]['excluded_zone_name[]'];
                                    var excluded_zone_locations = localValue[i]['excluded_zone_locations[]'];
                                    var excluded_zone_postcodes = localValue[i]['excluded_zone_postcodes[]'];

                                    tables += ('<tr>' +
                                        '<td><input type=\"text\" name=\"excluded_zone_name[]\" placeholder=";
        // line 829
        echo ($context["zone_name"] ?? null);
        echo " class=\"form-control excluded_zone_name\" value=\"' + excluded_zone_name + '\"></td>' +
                                        '<td><select name=\"excluded_zone_locations[]\" class=\"form-control excluded_zone_locations\" multiple value=\"' + excluded_zone_locations + '\">' + option(excluded_zone_locations) + '</select></td>' +
                                        '<td><textarea rows=\"4\" name=\"excluded_zone_postcodes[]\" placeholder=\"";
        // line 831
        echo ($context["zone_regions_list_placeholder"] ?? null);
        echo "\" class=\"form-control excluded_zone_postcodes\">' + excluded_zone_postcodes + '</textarea></td>' +
                                        '<td><button data-delete=\"\" class=\"btn btn-default delete\">";
        // line 832
        echo ($context["delete"] ?? null);
        echo "</td>' +
                                        '</tr>');
                                }
                                \$('tbody').prepend(tables);

                            }
                        };
                        fillTableFromLS();
                    </script>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 845
        echo ($context["sender_address"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 848
        echo ($context["sender_address"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-origin-direction\">";
        // line 850
        echo ($context["sender_address"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_origin_direction\" id=\"input-origin-direction\"
                                    class=\"form-control\">
                                ";
        // line 854
        if ((twig_length_filter($this->env, ($context["origin_directions"] ?? null)) != 1)) {
            // line 855
            echo "                                    <option value=\"\" disabled=\"disabled\"
                                            selected=\"selected\">";
            // line 856
            echo ($context["select_sender"] ?? null);
            echo "</option>
                                ";
        }
        // line 858
        echo "                                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["origin_directions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["direction"]) {
            // line 859
            echo "                                    ";
            if ((twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["direction"], "value", [], "any", false, false, false, 859)) == ($context["shipping_enviaya_origin_direction"] ?? null))) {
                // line 860
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["direction"], "value", [], "any", false, false, false, 860));
                echo "\"
                                                selected=\"selected\">";
                // line 861
                echo twig_get_attribute($this->env, $this->source, $context["direction"], "label", [], "any", false, false, false, 861);
                echo "</option>
                                    ";
            } else {
                // line 863
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["direction"], "value", [], "any", false, false, false, 863));
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["direction"], "label", [], "any", false, false, false, 863);
                echo "</option>
                                    ";
            }
            // line 865
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['direction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 866
        echo "                            </select>
                            <a href=\"https://app.";
        // line 867
        echo ($context["api_domain"] ?? null);
        echo "/directions/new?origin=true\" target=\"_blank\"
                               style=\"margin-top: 5px; display: block;\">";
        // line 868
        echo ($context["add_new_sender"] ?? null);
        echo "</a>
                            <div id=\"direction-preview\">
                            </div>
                        </div>
                    </div>
                    <script type=\"text/javascript\">
                        function previewDirection(address) {
                            var addressKeys = [
                                'full_name',
                                'company',
                                'phone',
                                'email',
                                'direction_1',
                                'direction_2',
                                'neighborhood',
                                'district',
                                'postal_code',
                                'city',
                                'state_code',
                                'country_code'
                            ];
                            var addressInfo = '';
                            addressKeys.forEach(function (key) {
                                if (address[key]) {
                                    addressInfo += address[key];
                                    if (key == 'postal_code') {
                                        addressInfo += ' ';
                                    } else if (key == 'city') {
                                        addressInfo += ', ';
                                    } else {
                                        addressInfo += '<br/>';
                                    }
                                }
                                if (key == 'email') {
                                    addressInfo += '<br/>';
                                }
                            });

                            \$('#direction-preview').html('<hr>' + addressInfo);
                        }

                        \$('#input-origin-direction').bind('change', function (event) {
                            if (\$('#input-origin-direction').val() !== null) {
                                previewDirection(JSON.parse(atob(event.target.value)));
                            }
                        });

                        if (\$('#input-origin-direction').val() !== null) {
                            previewDirection(JSON.parse(atob(\$('#input-origin-direction').val())));
                        }


                    </script>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 925
        echo ($context["technical_configuration"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 928
        echo ($context["technical_configuration"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"input-service-timeout\"><span data-toggle=\"tooltip\"
                                                                                                title=\"";
        // line 931
        echo ($context["timeout_help"] ?? null);
        echo "\">";
        echo ($context["timeout"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <input type=\"number\" name=\"shipping_enviaya_service_timeout\"
                                   value=\"";
        // line 934
        echo ($context["shipping_enviaya_service_timeout"] ?? null);
        echo "\"
                                   id=\"input-service-timeout\" class=\"form-control\"/>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"enable-api-logs-help\"><span data-toggle=\"tooltip\"
                                                                                               title=\"";
        // line 940
        echo ($context["enable_api_logs_help"] ?? null);
        echo "\">";
        echo ($context["enable_api_logs"] ?? null);
        echo "</span></label>
                        <div class=\"col-sm-10\">
                            <select name=\"shipping_enviaya_enable_api_logs\" id=\"enable-api-logs-help\"
                                    class=\"form-control\">
                                ";
        // line 944
        if (($context["shipping_enviaya_enable_api_logs"] ?? null)) {
            // line 945
            echo "                                    <option value=\"1\" selected=\"selected\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\">";
            // line 946
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        } else {
            // line 948
            echo "                                    <option value=\"1\">";
            echo ($context["yes"] ?? null);
            echo "</option>
                                    <option value=\"0\" selected=\"selected\">";
            // line 949
            echo ($context["no"] ?? null);
            echo "</option>
                                ";
        }
        // line 951
        echo "                            </select>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 955
        echo ($context["download_api_logs"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <a class=\"btn btn-default\" href=\"";
        // line 957
        echo ($context["download"] ?? null);
        echo "\">";
        echo ($context["download_api_logs"] ?? null);
        echo "</a>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 961
        echo ($context["delete_api_logs"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <button type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\"
                                    data-target=\"#deleteApiLogs\">
                                ";
        // line 965
        echo ($context["delete_api_logs"] ?? null);
        echo "
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">";
        // line 973
        echo ($context["status"] ?? null);
        echo "</h3>
                </div>
                <div class=\"panel-body\">
                    <h4>";
        // line 976
        echo ($context["status"] ?? null);
        echo "</h4>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 978
        echo ($context["domain"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <span style=\"margin-top: 9px; display: block;\">";
        // line 980
        echo ($context["server_name"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 984
        echo ($context["php_version"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <span style=\"margin-top: 9px; display: block;\">";
        // line 986
        echo ($context["php"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 990
        echo ($context["opencart_version"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <span style=\"margin-top: 9px; display: block;\">";
        // line 992
        echo ($context["version"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\">";
        // line 996
        echo ($context["curl_existence"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <span style=\"margin-top: 9px; display: block;\">";
        // line 998
        echo ($context["curl"] ?? null);
        echo "</span>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"border:none;\">
                        <label class=\"col-sm-2 control-label\" for=\"support-code\">";
        // line 1002
        echo ($context["support_code"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"support_code\" value=\"";
        // line 1004
        echo ($context["support_code_value"] ?? null);
        echo "\"
                                   id=\"support-code\" class=\"form-control\"/>
                            <br>
                            <a class=\"btn btn-default\" onclick=\"copyToStringSupport(); return false;\">";
        // line 1007
        echo ($context["copy"] ?? null);
        echo "</a>
                        </div>
                    </div>
                    <script>
                        function copyToStringSupport() {
                            var copyText = document.getElementById('support-code');
                            copyText.select();
                            document.execCommand('Copy');
                        }
                    </script>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal -->
<div class=\"modal fade\" id=\"deleteApiLogs\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"deleteApiLogsLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"";
        // line 1030
        echo ($context["close"] ?? null);
        echo "\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                ";
        // line 1035
        echo ($context["delete_api_logs_confirmation"] ?? null);
        echo "
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">";
        // line 1038
        echo ($context["close"] ?? null);
        echo "</button>
                <a class=\"btn btn-primary\" href=\"";
        // line 1039
        echo ($context["clear"] ?? null);
        echo "\">";
        echo ($context["delete"] ?? null);
        echo "</a>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->
<!-- Modal -->
<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"welcome\" id=\"welcome\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
            <div class=\"modal-body\">
                <form class=\"form-horizontal\">
                    <div id=\"screen_1\">
                        <h4>";
        // line 1058
        echo ($context["welcome_screen_1_title"] ?? null);
        echo "</h4>
                        <p>";
        // line 1059
        echo ($context["welcome_screen_1_text"] ?? null);
        echo "</p>

                        <div class=\"form-group\" style=\"border:none;\">
                            <label class=\"col-sm-2 control-label\" for=\"instruction_api\"><span data-toggle=\"tooltip\"
                                                                                              title=\"";
        // line 1063
        echo ($context["api_key_help"] ?? null);
        echo "\">";
        echo ($context["api_key"] ?? null);
        echo "</span></label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"instruction_api\" id=\"instruction_api\" class=\"form-control\"/>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"border:none;\">
                            <label class=\"col-sm-2 control-label\" for=\"instruction_test_api\"><span data-toggle=\"tooltip\"
                                                                                                   title=\"";
        // line 1070
        echo ($context["api_key_help"] ?? null);
        echo "\">";
        echo ($context["test_api_key"] ?? null);
        echo "</span></label>
                            <div class=\"col-sm-10\">
                                <input type=\"text\" name=\"test_api\" id=\"instruction_test_api\" class=\"form-control\"/>
                            </div>
                        </div>
                    </div>
                    <div id=\"screen_2\" style=\"display: none;\">
                        <h4>";
        // line 1077
        echo ($context["welcome_screen_2_title"] ?? null);
        echo "</h4>
                        <p>";
        // line 1078
        echo ($context["welcome_screen_2_text"] ?? null);
        echo "</p>

                        <div class=\"form-group\" style=\"border:none;\">
                            <label class=\"col-sm-2 control-label\" for=\"instruction_account\"><span data-toggle=\"tooltip\"
                                                                                                  title=\"";
        // line 1082
        echo ($context["billing_account_help"] ?? null);
        echo "\">";
        echo ($context["billing_account"] ?? null);
        echo "</span></label>
                            <div class=\"col-sm-10\">
                                <select name=\"instruction_account\" id=\"instruction_account\" class=\"form-control\">
                                    <option value=\"\" disabled=\"disabled\"
                                            selected=\"selected\">";
        // line 1086
        echo ($context["select_account"] ?? null);
        echo "</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id=\"screen_3\" style=\"display: none;\">
                        <h4>";
        // line 1093
        echo ($context["welcome_screen_3_title"] ?? null);
        echo "</h4>
                        <p>";
        // line 1094
        echo ($context["welcome_screen_3_text"] ?? null);
        echo "</p>

                        <div class=\"form-group\" style=\"border:none;\">
                            <label class=\"col-sm-2 control-label\"
                                   for=\"instruction_origin_direction\">";
        // line 1098
        echo ($context["sender_address"] ?? null);
        echo "</label>
                            <div class=\"col-sm-10\">
                                <select name=\"instruction_origin_direction\" id=\"instruction_origin_direction\"
                                        class=\"form-control\">
                                    <option value=\"\" disabled=\"disabled\"
                                            selected=\"selected\">";
        // line 1103
        echo ($context["get_origin_addresses"] ?? null);
        echo "</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id=\"screen_4\" style=\"display: none;\">
                        <h4>";
        // line 1110
        echo ($context["welcome_screen_4_title"] ?? null);
        echo "</h4>
                        <p>";
        // line 1111
        echo ($context["welcome_screen_4_text"] ?? null);
        echo "</p>
                    </div>

                    <div id=\"screen_5\" style=\"display: none;\">
                        <h4>";
        // line 1115
        echo ($context["welcome_screen_5_title"] ?? null);
        echo "</h4>
                        <p>";
        // line 1116
        echo ($context["welcome_screen_5_text"] ?? null);
        echo "</p>
                    </div>
                </form>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">";
        // line 1121
        echo ($context["close"] ?? null);
        echo "</button>
                <button type=\"button\" class=\"btn btn-primary countinue\" disabled>";
        // line 1122
        echo ($context["continue"] ?? null);
        echo "</button>
            </div>
        </div>
    </div>
</div>
<script>
    if (\$(\"#input-apikey\").val().length === 0 && \$(\"#input-test-apikey\").val().length === 0) {
        \$('#welcome').modal('show');
    }

    function instructionAjaxAccount(api_key) {
        \$.ajax({
            url: 'https://enviaya.com.mx/api/v1/get_accounts?api_key=' + api_key,
            success: function (data) {
                \$('#instruction_account').empty();
                \$('#instruction_account').append('<option disabled=\"disabled\" selected=selected>";
        // line 1137
        echo ($context["select_account"] ?? null);
        echo "</option>');

                data.enviaya_accounts.forEach(function (element) {
                    \$('#instruction_account').append('<option value=' + element.account + ' selected=selected>' + element.alias + ' (' + element.account + ')</option>');
                });

                \$('#input-enviaya-account').empty();
                \$('#input-enviaya-account').append('<option disabled=\"disabled\" selected=selected>";
        // line 1144
        echo ($context["select_account"] ?? null);
        echo "</option>');

                data.enviaya_accounts.forEach(function (element) {
                    \$('#input-enviaya-account').append('<option value=' + element.account + ' selected=selected>' + element.alias + ' (' + element.account + ')</option>');
                });

                \$('.countinue').addClass(\"screen_2\");
                \$('.countinue').prop('disabled', false);
            },
            error: function () {
                \$('.countinue').removeClass(\"screen_2\");
                \$('.countinue').prop('disabled', true);
                \$('#instruction_account').empty();
                \$('#instruction_account').append('<option disabled=\"disabled\" selected=selected>";
        // line 1157
        echo ($context["select_account"] ?? null);
        echo "</option>');
            }
        });
    }

    function instructionAjaxDirection(api_key) {
        \$.ajax({
            url: 'https://enviaya.com.mx/api/v1/directions?api_key=' + api_key,
            success: function (html) {
                \$('#instruction_origin_direction').empty();
                \$('#instruction_origin_direction').append('<option disabled=\"disabled\" selected=selected>";
        // line 1167
        echo ($context["get_origin_addresses"] ?? null);
        echo "</option>');

                ajaxDirection(api_key);

                var json = '';
                let arr = [];
                html.directions.forEach(function (element) {
                    element.id = element.id.toString();
                    var em = new Object();
                    em.full_name = element.full_name
                    em.company = element.company
                    em.phone = element.phone
                    em.email = element.email
                    em.direction_1 = element.direction_1
                    em.direction_2 = element.direction_2
                    em.neighborhood = element.neighborhood
                    em.district = element.district
                    em.postal_code = element.postal_code
                    em.city = element.city
                    em.state_code = element.state_code
                    em.country_code = element.country_code
                    json = JSON.stringify(em);
                    json = json.normalize();
                    json = toASCII(json);
                    \$('#instruction_origin_direction').append('<option value=' + btoa(json) + '>' + element.full_name + '</option>');
                });
            },
            error: function () {
                \$('#instruction_origin_direction').empty();
                \$('#instruction_origin_direction').append('<option disabled=\"disabled\" selected=selected>";
        // line 1196
        echo ($context["get_origin_addresses"] ?? null);
        echo "</option>');
            }
        });
    }

    function instructionApiKey() {
        var test_mode = \$('#input-test-mode').val();

        if (test_mode == \"1\") {
            var result = \$('#instruction_test_api').val();
        } else {
            var result = \$('#instruction_api').val();
        }

        instructionAjaxAccount(result);
        instructionAjaxDirection(result);
    }

    \$(\"#instruction_account\").change(function () {
        \$(\"#input-enviaya-account\").val(\$(\"#instruction_account\").val());
    });
    \$(\"#instruction_origin_direction\").change(function () {
        \$(\"#input-origin-direction\").val(\$(\"#instruction_origin_direction\").val());
        \$('.countinue').prop('disabled', false);

        if (\$('#instruction_origin_direction').val() !== null) {
            previewDirection(JSON.parse(atob(event.target.value)));
        }
    });
    \$(\"#instruction_api\").keyup(function () {
        instructionApiKey();
        \$(\"#input-apikey\").val(\$(\"#instruction_api\").val());
    });

    \$(\"#instruction_test_api\").keyup(function () {
        instructionApiKey();
        \$(\"#input-test-apikey\").val(\$(\"#instruction_test_api\").val());
    });

    \$(document).on('click', '.screen_2', function () {
        \$('.countinue').removeClass(\"screen_2\");
        \$('.countinue').addClass(\"screen_3\");

        \$(\"#screen_1\").hide();
        \$(\"#screen_2\").show();
    });

    \$(document).on('click', '.screen_3', function () {
        \$('.countinue').removeClass(\"screen_3\");
        \$('.countinue').addClass(\"screen_4\");

        \$('.countinue').prop('disabled', true);

        \$(\"#screen_2\").hide();
        \$(\"#screen_3\").show();
    });

    \$(document).on('click', '.screen_4', function () {
        \$('.countinue').removeClass(\"screen_4\");
        \$('.countinue').addClass(\"screen_5\");

        \$(\"#screen_3\").hide();
        \$(\"#screen_4\").show();
    });

    \$(document).on('click', '.screen_5', function () {
        \$('.countinue').removeClass(\"screen_5\");
        \$('.countinue').addClass(\"save_btn\");
        \$(\".countinue\").html('Save');

        \$(\"#screen_4\").hide();
        \$(\"#screen_5\").show();
    });

    \$(document).on('click', '.save_btn', function () {
        \$(\"#form-shipping\").submit();
    });
</script>
";
        // line 1274
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/shipping/enviaya.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2176 => 1274,  2095 => 1196,  2063 => 1167,  2050 => 1157,  2034 => 1144,  2024 => 1137,  2006 => 1122,  2002 => 1121,  1994 => 1116,  1990 => 1115,  1983 => 1111,  1979 => 1110,  1969 => 1103,  1961 => 1098,  1954 => 1094,  1950 => 1093,  1940 => 1086,  1931 => 1082,  1924 => 1078,  1920 => 1077,  1908 => 1070,  1896 => 1063,  1889 => 1059,  1885 => 1058,  1861 => 1039,  1857 => 1038,  1851 => 1035,  1843 => 1030,  1817 => 1007,  1811 => 1004,  1806 => 1002,  1799 => 998,  1794 => 996,  1787 => 992,  1782 => 990,  1775 => 986,  1770 => 984,  1763 => 980,  1758 => 978,  1753 => 976,  1747 => 973,  1736 => 965,  1729 => 961,  1720 => 957,  1715 => 955,  1709 => 951,  1704 => 949,  1699 => 948,  1694 => 946,  1689 => 945,  1687 => 944,  1678 => 940,  1669 => 934,  1661 => 931,  1655 => 928,  1649 => 925,  1589 => 868,  1585 => 867,  1582 => 866,  1576 => 865,  1568 => 863,  1563 => 861,  1558 => 860,  1555 => 859,  1550 => 858,  1545 => 856,  1542 => 855,  1540 => 854,  1533 => 850,  1528 => 848,  1522 => 845,  1506 => 832,  1502 => 831,  1497 => 829,  1463 => 798,  1404 => 742,  1383 => 724,  1379 => 723,  1374 => 721,  1366 => 716,  1361 => 714,  1350 => 706,  1343 => 702,  1338 => 700,  1330 => 695,  1325 => 693,  1317 => 688,  1312 => 686,  1302 => 679,  1298 => 678,  1292 => 675,  1283 => 668,  1278 => 666,  1273 => 665,  1268 => 663,  1263 => 662,  1261 => 661,  1252 => 657,  1245 => 653,  1239 => 650,  1231 => 645,  1227 => 644,  1222 => 642,  1218 => 641,  1213 => 639,  1209 => 638,  1165 => 597,  1158 => 593,  1150 => 590,  1143 => 585,  1138 => 583,  1133 => 582,  1128 => 580,  1123 => 579,  1121 => 578,  1114 => 574,  1106 => 569,  1099 => 565,  1091 => 562,  1084 => 557,  1079 => 555,  1074 => 554,  1069 => 552,  1064 => 551,  1062 => 550,  1055 => 546,  1048 => 541,  1043 => 539,  1038 => 538,  1033 => 536,  1028 => 535,  1026 => 534,  1017 => 530,  1010 => 526,  1004 => 522,  998 => 520,  992 => 518,  989 => 517,  983 => 515,  977 => 513,  975 => 512,  968 => 508,  962 => 505,  958 => 504,  953 => 502,  846 => 398,  834 => 388,  829 => 386,  824 => 385,  819 => 383,  814 => 382,  812 => 381,  805 => 377,  797 => 371,  791 => 369,  786 => 367,  783 => 366,  780 => 365,  774 => 363,  769 => 361,  766 => 360,  764 => 359,  757 => 355,  750 => 350,  745 => 348,  740 => 347,  735 => 345,  730 => 344,  728 => 343,  721 => 339,  713 => 333,  708 => 331,  702 => 329,  697 => 327,  693 => 326,  690 => 325,  688 => 324,  679 => 320,  670 => 313,  664 => 311,  658 => 309,  655 => 308,  649 => 306,  643 => 304,  640 => 303,  634 => 301,  628 => 299,  626 => 298,  617 => 294,  608 => 287,  602 => 285,  596 => 283,  593 => 282,  587 => 280,  581 => 278,  578 => 277,  572 => 275,  566 => 273,  563 => 272,  557 => 270,  551 => 268,  549 => 267,  540 => 263,  532 => 257,  526 => 255,  520 => 253,  517 => 252,  511 => 250,  505 => 248,  503 => 247,  494 => 243,  485 => 237,  478 => 235,  472 => 232,  465 => 228,  462 => 227,  457 => 225,  452 => 224,  447 => 222,  442 => 221,  440 => 220,  434 => 217,  429 => 215,  423 => 212,  373 => 165,  345 => 140,  332 => 130,  321 => 122,  307 => 110,  301 => 109,  293 => 107,  288 => 105,  283 => 104,  280 => 103,  275 => 102,  270 => 100,  267 => 99,  265 => 98,  257 => 95,  251 => 92,  245 => 88,  240 => 86,  235 => 85,  230 => 83,  225 => 82,  223 => 81,  215 => 78,  205 => 73,  200 => 71,  192 => 68,  182 => 63,  177 => 61,  170 => 59,  163 => 55,  155 => 50,  149 => 47,  143 => 43,  138 => 41,  133 => 40,  128 => 38,  123 => 37,  121 => 36,  115 => 33,  108 => 29,  100 => 25,  89 => 21,  85 => 20,  79 => 16,  68 => 14,  64 => 13,  59 => 11,  51 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/shipping/enviaya.twig", "");
    }
}
