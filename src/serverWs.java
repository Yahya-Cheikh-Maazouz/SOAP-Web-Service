import ws.BanqueService;

import javax.xml.ws.Endpoint;

public class serverWs {

    public static void main(String[] args) {
        String url="http://127.0.0.1:9000/BanqueWS";
        Endpoint.publish(url, new BanqueService());
        System.out.println("web service deployed on  "+url);
    }
}
