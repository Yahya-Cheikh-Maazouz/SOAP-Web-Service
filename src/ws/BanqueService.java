package ws;

import metier.Compte;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import java.util.Arrays;
import java.util.Date;
import java.util.List;

@WebService(serviceName="BanqueWS")
public class BanqueService {

    @WebMethod(operationName="ConversionEuroToDh")
    public double conversion(@WebParam(name="montant")double mt){
        return mt*11;
    }

    @WebMethod
    public Compte getCompte(@WebParam Long code){ return new Compte (code,Math.random()*9000,new Date()); }

    @WebMethod
    public List<Compte> getComptes( ){
        List<Compte> cptes= Arrays.asList(
                new  Compte (1L,Math.random()*9000,new Date()),
                new  Compte (2L,Math.random()*9000,new Date()),
                new  Compte (3L,Math.random()*9000,new Date())
        );
        return cptes ;
    }
}
