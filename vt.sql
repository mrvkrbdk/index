




CREATE TABLE kullanicilar (
 `id` serial NOT NULL,
 `isim` varchar(20) NOT NULL,
 `email` text NOT NULL,
 `sifre` varchar(15)NOT NULL,
 `kullaniciadi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;