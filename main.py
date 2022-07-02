from zeep import Client

wsdl = 'http://127.0.0.1:9000/BanqueWS?WSDL'
WsdlClient = Client(wsdl)
result = WsdlClient.service.ConversionEuroToDh(2000)
print result
comptes=WsdlClient.service.getComptes();
print comptes