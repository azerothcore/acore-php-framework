<?php

// workaround
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);
ini_set('soap.wsdl_cache', 0);

class ACoreSoapModule {

    public function getContainerExtension() {
        return new DependencyInjection\SoapExtension();
    }

}
