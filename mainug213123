package org.example.coba;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Boolean pukulTerus =false;
        Scanner scanner = new Scanner(System.in);
        //contoh nama petinju dengan kombinasi nama dan angka sebagai stamina dari petinju, contoh Paquito20, Paquito nama dan stamina 20
        System.out.print("Masukan nama petinju : ");
        String name = scanner.nextLine();
        System.out.print("Masukan kekuatan petinju : ");
        String kekuatan = scanner.nextLine();

        System.out.print("Daya tahan samsak : ");
        String dayaTahan = scanner.nextLine();
        System.out.print("Tingkat Kekerasan samsak : ");
        String TingkatKekerasan = scanner.nextLine();
        //TODO: BUAT OBJECT PETINJU DAN SAMSAK DISINI

        Petinju petinju1 = new Petinju(name,Integer.parseInt(kekuatan));
        Samsak samsak1 = new Samsak(Integer.parseInt(dayaTahan), Integer.parseInt(TingkatKekerasan));

        //Inisialisasikan atas
        System.out.print("Pukul samsak?(y/n) : ");
        String pukul = scanner.nextLine();
        if (pukul.equals("y")) {
            pukulTerus = true;
            //TODO: Panggil fungsi tinju
            petinju1.tinju(samsak1);

        }else if (pukul.equals("n")) {
            pukulTerus = false;
        }

        while (pukulTerus) {
            if (samsak1.isRusak()==false){
                if (petinju1.getStamina() >= 0){
                    System.out.print("Pukul samsak?(y/n) : ");
                    String pukulLagi = scanner.nextLine();
                    if (pukulLagi.equals("y")) {
                        pukulTerus = true;
                        //TODO: Panggil fungsi tinju
                        if (samsak1.isRusak()){
                            scanner.close();
                            break;
                        }
                        petinju1.tinju(samsak1);
                    }else if (pukulLagi.equals("n")) {
                        pukulTerus = false;
                    }
                }
            }
        }

    }
}
