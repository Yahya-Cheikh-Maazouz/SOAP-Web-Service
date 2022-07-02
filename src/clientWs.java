import myPack.BanqueService;
import myPack.BanqueWS;

public class clientWs {
    public static void main(String[] args) {
        BanqueService proxy = new BanqueWS().getBanqueServicePort();
        System.out.println(proxy.conversionEuroToDh(500));
    }
}
