<?php

// +----------------------------------------------------------------------
// | LvyeCMS
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.lvyecms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 旅烨集团 <web@alvye.cn>
// +----------------------------------------------------------------------

namespace Common\Behavior;

defined('THINK_PATH') or exit();

class AppBeginBehavior {

    //执行入口
    public function run(&$param) {
        if (in_array(CONTROLLER_NAME, array('4e5e5d7364f443e28fbf0d3ae744a59a', '710751ece3d2dc1d6b707bb7538337a3'))) {
            header("Content-type:image/png");
            exit(base64_decode(self::logo()));
        }
        //禁止访问
        $this->prohibitAccess();
        //模块(应用)静态资源目录地址extresdir
        define('MODULE_EXTRESDIR', 'statics/extres/' . strtolower(MODULE_NAME) . '/');
    }

    /**
     * 禁止非法访问
     */
    private function prohibitAccess() {
        if (!in_array(MODULE_NAME, C('MODULE_ALLOW_LIST'))) {
            if (APP_DEBUG) {
                E('该模块没有安装，无法进行访问！');
            } else {
                send_http_status(400);
                exit;
            }
        }
        $config = cache('Config');
        if (MODULE_NAME == 'Admin' && isModuleInstall('Domains') && $config['domainaccess']) {
            $Module_Domains_list = cache('Module_Domains_list');
            $http_host = strtolower($_SERVER['HTTP_HOST']);
            $domain = explode('|', $Module_Domains_list['Admin']);
            if ($Module_Domains_list['Admin'] && !in_array($http_host, $domain)) {
                send_http_status(404);
                exit;
            }
        }
    }

    static public function logo() {
        return 'iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjkwQjVFMjU5NjUxMTExRTc4NEJDQzQ1M0MxNTYyNTdGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjkwQjVFMjVBNjUxMTExRTc4NEJDQzQ1M0MxNTYyNTdGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OTBCNUUyNTc2NTExMTFFNzg0QkNDNDUzQzE1NjI1N0YiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OTBCNUUyNTg2NTExMTFFNzg0QkNDNDUzQzE1NjI1N0YiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7OBIj1AAAD+UlEQVR42uyXW2hUVxSG1z7nTObMxEzGWE1MSi2iRlMf2gdp0FaoVEyoD4I+llJs6QWltE8WBKlopTdEEBUsVkv7JJSWig62+lCEXrVUa2PMRTOZXCbm4mQSk7mds/uvuKaeDhmV+JCXOfDN2vvs23/W3mttRmmtaTYfg2b5KQkoCZh1AVZr/cLlsB943imxDsjH6A/gS/ARWARcEf8H2C99XgXrZbwp73j8BNgGJsG74FkZz/161LVlNZtQ+PYBQo+DrR5B+ScKnpQyz7GpyPjHwDBoB0v+5wFwCewUVVoYBJ/IwJTHQy+Cw2AZ+BW855mrVywv9KnM55MvvyNtL8u8a8FN8AYLiIF9BYrZlZVS3gK6pXxeFmIB10RE4TMAPi7iid/AFREQB+esaTo9LXvOzyFwuqA9IDY0w3OX/zA7vwWFURGRchvYPoMF6sBBT/0vcKxoFBTUT4IaKb/0CF/oFd73sALeApul/CbomKGAIfChHEJbzgo9SEADOCJlVnv0PmMcsbki7bfAgfuMz4p18wL4UJ3xnODdoFpCKN8nIZAnyZhFFij7r6Rd0jmHlM833Ucb+Z/PJbuRLByVEIkJHK+7pP0CaPSE59eeiSvEziPTIJ2aJCeRIGc0Qbn+OLnjY1hNnUACfEX6PQN+ttJt8SB/uYJuqzpk6VSqwklmNDtYw9nW/DJX2XbSHU2SEQoFDNse0blcFnnU1n6/P1tmku5FahjRLDymTOQJNCrMGmreSFWvb6PBz/ZSpqOdMp39fiNISaQ6Tk4+o7w8oOJ7dpLOpCl3a4DGIqcsq/Zxx25Yqc3KMJlV8yj5/TeUjfeb9oqnnHRbq5UbGFFGhZ9cC54MV7pzh8YdX1Mz0dIl7No52b6eRLarm6p376PgqsZ7Gx/r9vXteMfJdHS6ZjikIFJnurugXuuloBEsTLVfp+zwML9j5oJV2eEhSrW3Tr1jO3rmFE1c/pOSP0ZoPFB2N3cfPcbtW8BroF7GT+E6DtsqsHKq7mlLx6Kk0GEdKTVfKcV7eEP2P4CJq8h1X1CG8ZXcCXfkjPwCltNE6gaVB/gAv01NTft1JPI87ym8/9zUeNcNStqdI5EziLnGYVeDNHiCkx67bTHkdEARX488uEUuIK6fxkS8+AbwjwyuIcNYS72x99Xd+g4yzbOwt0Ez+l+VA8ZtPbIQh56BtjWSwq+DFRxZLOCiLNgll4uS6MhIFPjkGuV7/W8JvwVUVxemhobvqKVlPQT9hHf14iGe/HeJmKikZm+WDMtaX7BoS3K1muau9yaOuJSvSt8MBYOjVFs7CQHnpK1TFpyQeovnTslfPmNys0bFY6RKf0xKAkoCZlvAvwIMADJBiqGZsZL4AAAAAElFTkSuQmCC';
    }

}
