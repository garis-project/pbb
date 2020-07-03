-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 02:33 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login_admin` text NOT NULL,
  `data_admin` text NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login_admin`, `data_admin`, `id_role`) VALUES
(1, 'v$^%j&g(n)>*;,K-].9-f0/0N2]3@3S5G6\\7P7+9p95;F:G<x=??T>(?:@DC]DxD', 'o&.&Y&J)8*N+^,F+Q,x-j0G/C0|2S2x4', 1),
(2, '}$]%:(r#u)<+h*X+4.m-y/00C1k1z3s4<6K5n6*9I:B;b;j;n=)?6>;AK@8BYD+C', '5$[&5(S)S)=+;+$-;.t.q/J0.071U4b4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL,
  `harga` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `kode`, `harga`) VALUES
(1, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(1, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(1, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(2, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(3, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(3, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(4, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(4, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(5, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(5, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(6, '?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R436t5^7S9o:\\;#;S;==<?Q>&AT@bBRCDE', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(6, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4o5h7=8r8V8;;|:[;c<->G>w?0BkC:BME', 'N%$#=(l#M)W*G*b-g.E.z/n/B0w1%4=3'),
(6, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(7, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(8, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(9, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3'),
(10, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'n$Z#r#\\)4(!+%+4-A-/->/_110i3K3e3');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `data_mutasi` text NOT NULL,
  `id_wp_lama` int(11) NOT NULL,
  `id_wp_baru` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `data_mutasi`, `id_wp_lama`, `id_wp_baru`, `id`) VALUES
(12, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4u4_786G8m9I9N:@=L=c>=>%?^A>BAC>CCFsEjGVH}I=J\\KNM!M^MGOwOkRmQCSjS3TdWQV=Y_ZyZl[m]d]:_%!ha(!na6cMc:exelg&gxiSi#j9k/l*o8nOo;ruq8sJu', 17, 18, 1),
(13, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4U4S5D8*7\\:z:;<p<7>b?3>f?cArB8BSD^E)GjHKIII@KHL:K-MUN0OBOYP=S6TcT3TdWQV=Y_ZyZl[m]d]:_%!ha(!na6cMcFf)flgoh*jmj0jVm@m#oknrpJq(qjsKu', 17, 18, 1),
(14, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4u4_786G8m9I9N:@=L=c>=>%?^A>BAC>CaE-E*H@I0I5JNJoMXMbM%OKQ0RQRyRGT', 17, 18, 1),
(15, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4/6f5&7;8l:q::;0;M<==K@z?uALC<B!ECE4GYHiG(H3I/K(KJLCMSN1O:QdQJSeT', 17, 18, 1),
(16, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4U4S5D8*7\\:z:;<p<7>b?3>f?cArB8BSD+ETE,FjH>HcK#J%MhL3McN%O;R7QKT&S3TdWQV=Y_ZyZl[m]d]:_%!ha(!na6cMcZd*g[f#g%hqjMj1lfl,n2nBpar8r-rjt', 17, 18, 1),
(17, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4>4j6|7<978]:h<@;%>q>?>#@>@4ClDREvDKE8HGHvI}IIJGKhLJMmOYOYR*S=TyS', 17, 18, 1),
(18, '0%=&f#i)E(f)B*i+X.S.f080=2G302{4>4j6|7<978]:h<@;%>q>?>#@>@4ClDRE%D[G4G*IaHdK7L1MUL8O*OOO7P[S1RcT1U!VwVLW\\Y5[L\\6\\,^;_Z_*!;!9a8c?dMe7fQf=i,jVjTlOk6m<oQoMpnrRrEt$u', 18, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `data_pembayaran` text NOT NULL,
  `id_wp` int(11) NOT NULL,
  `status_pembayaran` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `data_pembayaran`, `id_wp`, `status_pembayaran`, `id`) VALUES
(1, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3E6%6j809d:E:w;(;&>O?m>a?sA5BPD&CXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(2, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3{4o5+6^8Y:a9M:%;\\>_>u?}?2@QB#DgCXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(3, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3H6H6b6O8+9-;c:(=x=\\>\\>Q@$@7CMBiEXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(4, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3r4p6!8(8%:5:x;\\;Y<t=_>t@QAXA2D.EXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(5, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3H6H6b6O8+9-;c:(=x=\\>\\>Q@$@7CMBiEXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(6, '[&h&9&/)4*n*b,.,V,/-9/J1,0J1#2M3i5E6L738b:l;p:1;B=J=Y>G?<@$CHBPEXD3F2HtH|IeKHJnKMNcMAPeP\\RZSgR)T', 17, 'I$6#W#}(+)$+1*3-l-?-i.B0R0:1;3X5', 1),
(7, 'b$_%}&4)1()+;*?+2.6-=0\\0k0g1[4A3*4t5H8y8+9*;d;v;P=f?v>b?>AdCVC&D', 17, '7&0&!(A#+(c)3*g+B,=/M0Z/C0w1b4c4k4L6C7x8p8X:j:};w=%?R>]@-BLAICBC', 0),
(8, 'b$_%}&4)1()+;*?+2.6-=0\\0k0g1[4A3,4m5b7^7^:/;o::={<8=J>a?1ALAOC*D', 17, 'T$*%a#m)E)E+u+:-P-k.v.#1+0]1:203(4G5w7>9N9l:]<a=P>*>g?/@S@jAJBSC', 0),
(9, 'b$_%}&4)1()+;*?+2.6-=0\\0k0g1[4A3,4m5b7^7^:/;o::={<8=J>a?1ALAOC*D', 17, 'T$*%a#m)E)E+u+:-P-k.v.#1+0]1:203(4G5w7>9N9l:]<a=P>*>g?/@S@jAJBSC', 0),
(10, 'b$_%}&4)1()+;*?+2.6-=0\\0k0g1[4A3,4m5b7^7^:/;o::={<8=J>a?1ALAOC*D', 17, 'T$*%a#m)E)E+u+:-P-k.v.#1+0]1:203(4G5w7>9N9l:]<a=P>*>g?/@S@jAJBSC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `data_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `data_role`) VALUES
(1, 'a%6#$#:(a)l)U*k-F,B-X0L0_2J3#4[5'),
(2, '5$[&5(S)S)=+;+$-;.t.q/J0.071U4b4');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `kode` varchar(64) NOT NULL,
  `data_tagihan` text NOT NULL,
  `id_wp` int(11) NOT NULL,
  `status_nop` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`kode`, `data_tagihan`, `id_wp`, `status_nop`) VALUES
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4.4u5X6o8J8=;2;d=p<X>i>EA9BNB0CpD', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J3w5f796G9f9B:h<#<h>[>J>BA,@@C,DkDyE%E,FiG^I_J1LQL1LeNnOfQ#QiQ+R2T', 18, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4;527c608e:o;T<d<@>(?F@>?5B9B$B<D', '/%A&2(J(E)t*>,:+@-Z/e.*1!0n3c4f445H5{727W90;[:+=K>J?8>+@KB!C4CxC9E.E!F=I_HeK\\J_MuMFN(NDQ/Q+QFSBU', 5, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', ';&x&+(7#E(>*l,n,g.^.$.%1e1x1g2G3/5#6l678O9m;x:?;A>}>J>i@3@9CKCVC[F7F0HkGIIMJJJ6L6N=OlO9PkR#SZRUU', 18, ',%O%|#x#t)b+D,6-2,f-#/4/Q2c3-4q3'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J3P6!5X7C8u99;Z;R=7=V>R?RA#@MAMB(DWE#F*F1HkIwI2J&McMJMjOCQ7P7R$S|T', 17, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'g&q%a#n(_)f+_,!+,-6/\\0)0$2A1\\3R5@467S729y8j;G;#<T=5?]>t?gA?B6CJC;D<G\\H;HmINK8LQLJLcMYOTPfQBSXRkT', 18, ',%O%|#x#t)b+D,6-2,f-#/4/Q2c3-4q3'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'T%r%1#l(B*x)s*L+g.A.%.<1(1!3_2?5w4+6j8E9q9{9%;i=O=?=9?LAM@gA%BvDtDQFfGGIzI6J<J7KcL{M6PEPDPDQQS%T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', 'm%j#u#,)N*[*\\*W+S.S.00G170;2E4<4Y6@7:6O88:8:E<L=T<6?H@k@I@0B:BxDtEiG8HbI_J;IDKSM0LVM:OPO5QDR<SWU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'E%$#X&()((=+d+O,_.w-X/E/]1j1C4\\4,5E6g649D8N;c<!<*</?$@u@ZBoAjDmEjDOE)FmGzHhIeJ/KYM6N9PiP<QmRFT%TPVXUeV5X#Y@YRZA]G^7_k!b!b!ja@dQc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4o5h7=8r8V8;;|:[;c<->G>w?0BkC:BME', ';&x&+(7#E(>*l,n,g.^.$.%1e1x1g2G3)5.5_747W9{9_<8<Y<Z>z?-?C@0AIBFE[F7F0HkGIIMJJJ6L6N=OlO9PkR#SZRUU', 17, ',%O%|#x#t)b+D,6-2,f-#/4/Q2c3-4q3'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', '6&(&)#}(**a+F+0+e-j/z.{0i1\\2X3S3e5v5R7/8E:F9^;+;3<l>S>2@.@-A^BHCSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J3=4d7h7$9=9U;#<d;T<4?:?D?oBYBNC]EjEbExF}HSIdI$J0LyLpM&NQQlQaRpRNU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('0%=&f#i)E(f)B*i+X.S.f080=2G302{4\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '=$e&((N)F).++,P,{,S/M0(0=1f2#3B476n6*7E9>9c;\\<3=2>7?(@gACABB@BnDNEUFaFcHmJ>J@KHL+MIO/P7P?Q2Q}S$T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3;527c608e:o;T<d<@>(?F@>?5B9B$B<D', ':%k&\\(9)e(0+/+Z+c,Y-v/g1o1\\343+4W5(6:8c8?8X;};b=L=E?K?X?DAUBEBMC;D<G\\H;HmINK8LQLJLcMYOTPfQBSXRkT', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'f$h&(#/#}(!)M,_,@,b-Z.-1t1G1Q364-4^7[8O8>8C:w;6<f=m>[?J?*BmCuCgEjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'y%@%N(#(9*:)6,l+_-d/E/U1&2&1T2X4(4T5;7c958Z;x:U;n>z=$@z?HAbCDB}CjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'Z$/%c#b)H(\\)%+e,R.4.]061\\2.3Y2m4S5[5o6<9@:U;l;L=n<j=a?p?K@NC(CLD%FeF_GiHfHWJ9KOKiN%O_NQPwPGQ!SATCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'D$6#c#6#6*5*E+u+/-o-|.)0-0e2p2A4W6I5*819V8@:#;R;M>G?A>kA$BgAkD;ERFnFKGcGlJKIPJ;LCMCOBP>O4QpRzRjU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', 'v$:%G(z(t)W*;+5,8.<.T.)/T072%2N5W4/7T6e8$9c;7;F<P<?=(>P@]B<C4B!C+F:FkH!IAHKIbK@K!LlO)P;QHP]QiSrS/VkWAVLXeZS[z[[]C]2_a^b_j!Ka{bgc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'T$V%a&N)|){)m,p,m-N/u.31f2k1y3!4U6h506!75:s90:,;%<[=o>^?=@GBYD^ECFeGtF;GNI|I/J4M4LIOoO>OUPBSkT&S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'F%R%m&R)4*W*t+i-W.!/9/]1F2Z1A344k527C7r7^8Q;k:A<L>g?e@:Ae@*B<D=EjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'f%\\#<#B)Y)U)),;,+,K-z.V0J1O3b3w4e6|6j7Z8/:S:E;6=,<,=a@3?3A3AlB7ELDSGPG@G:IBIALEM7L,N\\NiPiP]RESBU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('1$$&n&Y)r)>+T+\\,*,3-b.9/M1*2C3u3\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '!&-%j#+)I*U*e,q+T-k-\\/f02003&2u4j6G5w66988+9I;(;>=X>.@-?8BuBICWCPFIF$G2H%JLIeLFLIM?MiN=O5QUQ!S(T;T<W\\X;XmYN[8\\Q\\J\\c]Y_T!faBcXbkd', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'C&l&*&E#u(g*G+x+N,,.00%0=1L3@4e4E6W6&7:8,:9;W;S<p<;?d>K?l@+A3BjCeFaE.HlGLIXK}K7M;NRN7O5O.QnRnRZTCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', '/$f&+(L#6***_+d+],v-b/p0j2y2r2T4Z6G7M6$81:]:/;7<p<e?s>,A?BhA?DID3E<GDG9ImH$ItKBLwMzNzO>QRPKQSRZSnTZWrW\\Y4X![%[4]A]/]>__a1!icKcec', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', '@$^%:&U#3*]+h*]-s,/-G.!/J073U3n4t5D7Q6Z9<8i:a<5;&<Y?.>4@{AkCcB_C2EZG?HQGQH-KLJSL^LeObPAQaP1SZTWUbUaW?XaXmYSY6\\P[@\\j_)!S!Nbmb<cJeYe\\flf[hOh0i%k.kmnco8napip$s\\rxs', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'a&\\&x&i)l)]+_*X+y-Y/H051\\0(3X2(5j6=7P6#8Z9O:f;];[<!?&?.@Q@eABDVCVDBFpGEH[I6K(KRK%MbNYNOQWPTReTHUZTyU[WjXuYNZ|Z=]c]u^T_daA!|b_b)d', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', '/&O%D(9#S(T)+*s,,.%.50-0Y0#2?2t36675,7)8R9d:B::=R<H?f>V@v@jC?BqDgE$G\\FZGNI.K2L(MxMeN,N<OSQFRXRYS', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', 'G$D#R&0#{(_*M*s,D-#/$.D/,1%3G4O4#466=7o8o9K:\\<K=8=L>2@:AJ@QA4BjC>F1EsFqHBHeJeLIKeNeMiO|PzPqRRSnUjUqU5XgWvYyZgZ.]k^N^+_o!l!Ua9d0c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', '*&##<(Q(x)R)L+v+N-$.R0Q1:0l1r223M4+6<6;8g8h;9:U=x=S>;>!Aj@.ArB<C_F^F6G&HTI[ILKaLGNjN3PtOHR8Q\\SlT,TqUYX3YrYpZhZ([X^c]D_r_/b<bucNe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'V%%%K&5(p);*I*b,(,d.V/i1J1c1c3.5?6O5s6B7D9%9|:f=\\>$?a@6AIBYA6CWCoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'E%$#X&()((=+d+O,_.w-X/E/]1j1C4\\4l5%7T8,8^:69S;t<N=T=:>(?aB)AoB0EoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$8#V(8#%(4)>,E-],h.p/+/N1M2P2p4\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', 'm%j#u#,)N*[*\\*W+S.S.00G170;2E4<4.4E7u7A9I85;D;E=m<\\?@@-AfAcB|CDD3DbFAFkHqHfK0LGL@MgONN.OePMS6RqS', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R436t5^7S9o:\\;#;S;==<?Q>&AT@bBRCDE', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J3\\4&7e8?7#8a;a<|<4<C>:>KA\\@9CZB&CyE%E,FiG^I_J1LQL1LeNnOfQ#QiQ+R2T', 17, ',%O%|#x#t)b+D,6-2,f-#/4/Q2c3-4q3'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'C&l&*&E#u(g*G+x+N,,.00%0=1L3@4e435T6>8&71:c:Z<s;U<J>,@)@iA6BJBfC@FjG9F3HTJ[IjK-L0M2O]OtP_QLQ;S|SsThV-W2WBYWYt[<]-\\v^d!jaibmb4d}c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'X%W#$&/)A*;+6,n+L,?.G/O1&1E3l3+4B6U7v6]8D9P9u:N<5>>>T?XAgA_CFD9E^D^FXGfG/H[J5K2MJM]M$OYO!PTQ#S/S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', '6&s&$(P(2(H)9*O,>,..T.P0C2g254s4%6t688$7q8o:+:V<z<$>I@#?o@gA)CdCSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'X%W#$&/)A*;+6,n+L,?.G/O1&1E3l3+4c6\\7i7R8/8l:e<?=1>O>Y@#@,B>CJDnEHDoE<G#IRI-IXJ^KhLON+O9PlQ+S8TAU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'c$\\&\\&=(((E)o+!+?.$-W/e/J1W2}2(3|5)5@8)9+8%9i;C<y<5=b>o@UBlC8CWE', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', 'X%W#$&/)A*;+6,n+L,?.G/O1&1E3l3+4B6U7v6]8D9P9u:N<5>>>T?XAgA_CFD9E^D^FXGfG/H[J5K2MJM]M$OYO!PTQ#S/S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', ':&n%/&*(m(z)m,S-G-].=/m/!0z2L4I444?558.8):O9%:T;G=5?]@u?sA+BNCiC[EPGrGCGMHWJ9K+MhN@OHO:P[RCROTpSvUBWMW7W2YAY0\\\\[C]G]n!U_8aUa>b%d', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'V%%%K&5(p);*I*b,(,d.V/i1J1c1c3.5G4A6D8,9w9@;B;+<}<??K?dA<BqA0CMDoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', '7%Q&6&M(9)p)(+f,|-b-N/K/,181I4C3d5.5l7f8R:-:{;0=E<i?_>2?[B>CdD%C;DNGeF\\G9J$KTLmMILcNiNbQ+Q4R3R[U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('?$9&L(:(M)U+6*K-M.3.N0Z0,2l2n4R4\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', 'm$]&L#N#2)&)^,m,l-e--//0F2f1=4I5D6^64678}8J;9<7=A<x=Z@9A3@hB,B)DSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'R%2%M&:#x(5+j+=-c.C/P0Q011i3j2e444l5n758M:D:V<y;i<#?D>N@2AUCrB-C!DLG}GVISI+I(LoMTL@M%NmP!P4SHS*T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', ']%S#=#O#0(%)n*p+1-b/x/x/&2P2%3H4i4S5e608x8b;?<7;8<D=C>l?#BZCqCmC9E.E!F=I_HeK\\J_MuMFN(NDQ/Q+QFSBU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'E&X%*#.)4(B*d+N,@,e-[0Q/]1L2o4m485T6$6q8):W;u;6<]<g?=?A@J@%C^BaDgE$G\\FZGNI.K2L(MxMeN,N<OSQFRXRYS', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'V%%%K&5(p);*I*b,(,d.V/i1J1c1c3.5R5*6@8G9[9>;7:7<Z>8?J@t@n@YBDBWDoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', '(&=#^&*#T*e*L+@+G.E-U0x0N132b4-3D5h7D8^9z9l;b:H=I=b?C?B?>@aC>B<DHDoE<G#IRI-IXJ^KhLON+O9PlQ+S8TAU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', '/$f%p&E)h(o*P+\\,q-O.g/51^1E3N3f5e4n5Z7y7g8^9q:=;i>T?V@^?TBJB@C|C?EQE@GOG/H8I$L;K9M!MFO%QxPfS=R;U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', '.$A&!&j#h(g*L,^-7-0-!0_0N2:1P3U4O6S527W7K8b:F;\\;s=k>k?j@EAYA9BRDHDoE<G#IRI-IXJ^KhLON+O9PlQ+S8TAU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', '[%m#:#U(C*@+V,A,F.=-s.m011#3q2?5h5U567%7H95;<;T=!<T?x?8@;A$C\\DYE*D(G|FVHeH.IwJVKPNFODNJPcQ:QkRZTgV>UQW:X]Z<ZKZ]\\h\\r^U_[a6!mc^dnc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'S$5%p&l#L*q)l,H-E-[.&/X100p2f2m3b4y5%8H8M9B:i<z;O=Y=2@;@Q@VBeB4E9E.E!F=I_HeK\\J_MuMFN(NDQ/Q+QFSBU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('@%(&?&^)T*<+M*&-I-[/U/M/&2%3(4X4\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', 'f$h&(#/#}(!)M,_,@,b-Z.-1t1G1Q364J5I6c699m9.:L:R;y<&>y?V@:BtAnCmCjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'p$[&!&w#_(+)E,6+i.[-k/4122g3o31404_5x7;7B9^:{;3=5<p=&@C?LBHCUDFC)E=E;G*G8H%JPKkMHNrM8PoP,PMRlR6TCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'p$[&!&w#_(+)E,6+i.[-k/4122g3o314*6F5$6Z9g8h:<;$<\\<X>Z?&A4@QCQDBC+F:FkH!IAHKIbK@K!LlO)P;QHP]QiSrSCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'E%$#X&()((=+d+O,_.w-X/E/]1j1C4\\4Z4v5h7V9L:H:m<=;:<+>Z?&@6A^ClB%D8ESGSGiIBI2JVJYK,N?M_PwO(Q<S9TGSCVlVKWJWcZ?[nZV\\k^V_B!,!l!:a%cnc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5e5]6j76819w:h<u;%>$=X>VAa@!CiDND', '>%7%F(m)v(]*d,{,Q.k.6.8140]3:344N4)7!7w8E:$;7:v<0>n=->;?9BVBMD+EoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'o$0%W&6(>(Z)F+P-(.9-.0T1F101C3&5*6]5f7)8/:8:-;6=u=}>W@S@bB?B@D@DLDSGPG@G:IBIALEM7L,N\\NiPiP]RESBU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', '^$n#4&b(X(,*A+$-Q-}-M0<1_2G3N2k4C4c7}7+7o8:;C;S<l<9?0?f@[@ICuB.E>DREMH.G?JNJKJ\\LdLHOZN6QyQCQ[R!S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', '@$^%:&U#3*]+h*]-s,/-G.!/J073U3n4t5D7Q6Z9<8i:a<5;&<Y?.>4@{AkCcB_C%FGE8FFI$HvJEL$MpLFN<NTPYR)Q6S2S^T^VXWfW/X[Z5[2]J]]]$_Y_!!Ta#c/c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'Y$8&7&y(c(g+R+6,W,5.i/w0z1(2!2s3(5&597_7=8l;:;G;z<??4@#?^AwB$B]CaEDF*F,IgI_J$LMMvM$NIP4Q8QDRCT&T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'X%P%R(X(3)&+D*3+V-=/O041/1n3k2h415q5l6B9(8q94:n;R>3>_@=@GA&A0D7C=EWE:F^IiIgKPKeL/N2M>O|OIPWSHS6T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('A$*#;#@(x(R)>,S,m-G-y/A1a1Y3H3T5\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', 'D&E%P&^#5(#+d*A,U-Y/?0;/K0g2e2R475Z6(8M7%9G9P<#<b=K>!?x@NBJCQB2D)E=E;G*G8H%JPKkMHNrM8PoP,PMRlR6TCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'X%W#$&/)A*;+6,n+L,?.G/O1&1E3l3+4t4M5p7Y7x8I;Q<n=P=T?#>VAg@XAHD*DHDoE<G#IRI-IXJ^KhLON+O9PlQ+S8TAU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'C&l&*&E#u(g*G+x+N,,.00%0=1L3@4e4b4F5f7V8]9_;^<j;Y==?L>\\@*AEC.C&D8E4FoF>HNHjJEKvK7NRMkO@QVQ)Q,SGSCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', '3$V&,(I(>*Q*d*5+g.n/H061R0%2;3(4A5!566l7W:H:[;n<B=@>+?JAZAgBIDHCSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5e5]6j76819w:h<u;%>$=X>VAa@!CiDND', '=$P#Y#F(S(]+1,&,o-$.</n/50g3!3)5?6<587I7H:T:o:0=5>p>]>M?mAWCeB@CjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'j%M%F#F#F)D*f,b+r-j.I.Y/V1.1U2k3=4!5f6B788e9Q<E;/>>>;?L?[B<ACBiDxDSFhHDH+H^K.J/MRM8NTP1Q>R#S8T0TjUqU5XgWvYyZgZ.]k^N^+_o!l!Ua9d0c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', 'M%U%}#1)]*L+_*j-S-0-)0E0r0$363m4D505M6n7}9-:$;/;L=z>{>K@FBbCuBVE[FpE6G<I?IuJfKXLIN^ODPHQERPQkS2UCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'K&2&B(O#O)G*(+*+%.u.f.X/y1N272Y3X6e566F8c9e:\\<(<?>j>k@LA{@KC0DZE[FpE6G<I?IuJfKXLIN^ODPHQERPQkS2UCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J375r5K8U8h8d:;<Q;&<m=4>9@ZBFAkD6E/D:FVHEGXH2IiJXM.M5N*O<O+PVRsRQT', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'G$(&[&/)F(z)_*7,c-c.G0G051A2q3m3q4i6H619A:3:);(=Z>I=W?-A=B#BPB:C+EQFSFxH^IIJSLVKaMsM7OtPzPtQaTRT>UfV6WpW{X!Yh[?\\N\\J]1_G!TaQb]cPc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$7&X&k(0**)U*h+S,d.v/8/51d2p3N5\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '9%K#d(&)b(_)A+P+@,0/]0Y/>2+3+4Q3K4H6k8U7:8j;/;5;J<M>o>PAK@<CYCXE;DKF\\F^InH=J$JrLnLoORNQP|QvRLRtS', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', '[&e#M&/)@)S*:,P-5,B/Q/=0v1:2D2O4#4+5b7)9q9G:,<4<z=w=|>h@C@|AGB<D', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', 'R&/%?#+#P*d+t*Z-#-3-L/V0=2^293I514C6}7\\7c:L;i:9<f<>>C@W@?BKCzC}DRF(GdG]IlJ!IXLvLzL2NLOTP.P\\RXS0TCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'H$d&b(X(](0)K*+-<,_.D/5/}0M1%3I596r6P6N8\\:V:I:Z;s=L?{>.@y@aBoCKESFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'E%*#5&-)P)Q+H,q,k,8-1/80W28153B4*41786j9W9Y:]:^=F>s=r>,@D@7A+CyDjEqE5HgGvIyJgJ.MkNNN+OoPlPUQ9T0S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', '%%n#K#-#&*c*:*n,m,Z.h0T/S0\\1g3G5=5e5<7N9Q8c:a;/<U=t=N?:AWBFC*ClC4D:GYFZHhIhKbLDKuM?MUO8PkQkSsS2U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'G$D#R&0#{(_*M*s,D-#/$.D/,1%3G4O4M5R6.717H:Q9e;:;8>8>$>??T@zA;D1E.E@EMHxGLJ!KAJ0M,L7NCOiP7QIQYShUMTlVCVUXMZqZS\\G]2^}]-^Q_:bQbsbcc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', '\\$j&?&>#[*l+0+m+P-@/[.L1q0W2b2)4f5y678z8o8j;5;,;|=;?J@)AlAeCBD*E[E(GkH}GMINI#JWK1LAOOOTO:Q4R@T=T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', '.&!#>&^#B(a)5+T,s-.-S.X/b2(122W4)4*6h7v7T8o9R:]<Z=M>I?o?wATBJDvDgE$G\\FZGNI.K2L(MxMeN,N<OSQFRXRYS', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('C$x&W&T(O*i+6,9+=.>.S0Z1S252)4%5\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '2$N&]#$).)l)i*:,J.X-O.3/X1Y3C4&3Q6|646A7?8g9E:f;&>&=v?[A9B$BwC2C', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3;527c608e:o;T<d<@>(?F@>?5B9B$B<D', '-$=&Y(L)s)j+K+B+n.h.60a0)1_243L3X4+6H6a8l:d9d:\\={<$>B>C?GBtAcDIE+FkE>G)G\\IeKgK;L-L*NqO;OCQ+SCSzThU0UOV7Y%YK[9Zz[$]w]h^*!JbXbZbKe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', ',$6&{&0(x(A)4,R+/-7/t/J/:0Y1h4T3c667K7l7e:0:d<C=<<3?+@+?[AcCXBsDcD4G8HcHoJEK+K2M!MuMNOBPYP(R|ROToUXW(V4YpXsZ^Ze[s\\7_0!oa&abc&cHe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', '2$!&c(x(m(|)B+8-2-_-%0R0x0t2{3w3K4A7J6.8P:E9[:^<(<5?7?A?v@ZCSD&D*F[E|FSHjJoJHK2K<MyMjP^P<QkQER?TJUUU6WGYnZ#Zg[Z]7]7]Y_4abaZc_ccc', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'd%>&O#K#1(!*.+K-e,g-X/(0Z1?3\\2J5G5)7\\6i8[:J9]:$</<E?n>6@aANAUB)E', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', '.$5&D#H#p)?)?,j+Q,a.D.21?0e3c2+5z446]8{7o8n:H:a;&>T?#?Q?AAqACDRCsDZF/FAIDIiJNJYKaL^MJO4QgQ]Q#S!S!U4W8X%YwY([&\\x[D^{]5!_!W!@awbxd', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', ';&1&l(C(?(/)#,G+4-x.#0<1J2(3G2N5*4:757q8L8,;7<K<o=]?<?8?!@<AHBICSE@F7GKHbH#KwK3KcLJNgN{PCPmRQT)T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'Z%j#j&q#a);*M+c->,Q-O.(0!0_2u2:4:6,7C7:9B989):I=d<P=s?(AG@(ANBbCDEgGUHhIdHSK)LwKCM/NBPhP$RJQ5RVU', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'R&c&g(9)w(3)T+Y,d,0.w.4/j2@2l2x3&5R6r6[7w9l:9<P;v=k>z>V?,@cAZBZDOFXF&FUG^HAKVK)L3LBNAO7OWPLR9TjUCVeWtV;WNY|Y/Z4]4\\I_o_>_U!Bckd&c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', 'e&=&+#!)n*E)?,#+<-5-10d0J0=3n2F3#4+5b7)9q9G:,<4<z=w=|>h@C@|AGB<D', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%-&((L#>)g)n*U-o-l-k/T0A1L2T3o3\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '>%7%F(m)v(]*d,{,Q.k.6.8140]3:34466?5@8B7z8#;5:M=Q>O=}?f?DA>AbDVDoEEE!G#IGJNKcLSKZLfO;OVO,PqQ\\RMU9U.U!V=Y_Xe[\\Z_]u]F^(^Da/a+aFcBe', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('z%}%-&V#](;)-,J,G-n-#.21v0Q3u234V5O6*788g9R:T:>=O>i>C>6@=AlBPCVD', 'm%w&9#h($)J*Z*D+E-T/U./1L022J2J3w5f796G9f9B:h<#<h>[>J>BA,@@C,DkDyE%E,FiG^I_J1LQL1LeNnOfQ#QiQ+R2T', 18, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3;527c608e:o;T<d<@>(?F@>?5B9B$B<D', 'Y&u%n(U#&(.)u*[-O.n/(.Q/H1t2e4b5.6?7@8h9n8,;0:\\<z<P?0@hA=A<CRDgE@EjFMGgHjJAIgJ?M.M*O,OcPgP/QyS-U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3c4<7X657j:d;@:3;h>Z>K>nAWBcAdCOD', 'b&#%R&M)#(P+v*I+Z,-/1.6/$2f3D2T4U5.5g6m7u9T;^<n<k<]=&@r?:AvAzCqDSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3D5T606;9&8e9i<I=Y>c?)@PATA|AFC6D', ';$i#n&:(X(G*&+8-_.K/d../J2k3.2/5%4:6W638N:n:@:[<r<F=U?lAdAEA6D?DnEHGWG_HbJeKNK|L<L0NwOAQyPRQjSZSCUAVaWRX<Z|Z|Zz\\F^I^a^r_Pb8cgc(c', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3e5]6j76819w:h<u;%>$=X>VAa@!CiDND', 'E&X%*#.)4(B*d+N,@,e-[0Q/]1L2o4m4;4R6h7x83:!9d<g;2>J?-@mAN@BAKDmE6F;EfHCG:I,KvKJM]L=M0NOQwP*QxS*U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3h4(5e6/8L9c;h:(=d=,=g?f@hB@BJBJD', 'S%$&<(T#/*<+g+x,..A.V.)1n1i1X4T574I7_6N8a8U:D<r<a=h?,>&@2@SAHBtCSFVGyF;I:HxI<K)L/M|MoNlQ=PhRiT9S', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3I5&5C689.9N;}:D<*<==d?-AJ@iCICgD', '2&;#1&L#()})7+h+m.<-c0Z1<2i1v3t4/5J556,7V9n:T:Y<P<Z>_?u@^B&CLC?EXDrFNGrG$HRJ>J3M#MyM#N\\P4Q1RPT3UWV\\UGX3YBZ0Z)[^]m\\]^L_m_<b4cGcTd', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3i6y6n6r7C:3;<;I<Y<x>e>>@v@YCBB[C', 'x%j&n(=)h(A)p*?-]-<.80-/u0)2J3>5h5J7$8w8h9c;0:P=l<.>J?TA2B/ALBmCVDbEIGWG-H;K_LQMcL=OLN_QeP1SDT&T', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3S4l657k9{9F:9:[<x=>>D?kARBlAsCqC', 'f$h&(#/#}(!)M,_,@,b-Z.-1t1G1Q364H4|5u7<9|9V9s;6;W>\\=(?&?hAkB$B/CkEzERGmIKJ*JQJ$M/N&N2PZQ{Q!QnR(U', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3\\5n7f8q7^:}9e<J;C>5?,?0AJ@tAeC:E', '>%K#H(L)**M+m,W+y,J/<0%1^2u2O2r4/5J556,7V9n:T:Y<P<Z>_?u@^B&CLC?ECDbF2H!GlJTI*JuK7LgN>P!OlQtQ8TOU[TvVDV?Y&YbYSZ^[V^V]>_o_ba.a7b!e', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273'),
('}$p%{&]#_([+*+^+],h.W0{0v002R2E3\\6e6A7f8>:2;M;2={=p=3@\\A!@DCECPD', '1%t%m&#(t(/*F,9-.-{-,.E0y082S4Y4v4j7X8F7F9U;F<$;t=+=a?8A,A+BoD?DUF#GMH1IGJ=JXKxKeNxN^O;PaP?SZT[S=UPVTXvX2YfZM\\c\\n\\<]b!(_%bdbKb[d', 0, '&%%&w#k):*V*t*o+8.Q.d.@/#1I2?273');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_pembayaran`
--

CREATE TABLE `tmp_detail_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL,
  `harga` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `data_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`data_validation`) VALUES
('$2y$10$ts8bYGfG2pDwSARGg7Y4We1G8p/X7gX5J1wvtDa5oGuCpqLH643wm');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_pajak`
--

CREATE TABLE `wajib_pajak` (
  `id_wp` int(11) NOT NULL,
  `nama_wp` text NOT NULL,
  `login_wp` text NOT NULL,
  `data_wp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wajib_pajak`
--

INSERT INTO `wajib_pajak` (`id_wp`, `nama_wp`, `login_wp`, `data_wp`) VALUES
(5, 'f%J&=(l(a)[)L,h+:.T/a0$0L051L2m4', 'P%E#P#b#U)(+(,u,},x-W0b0b2H2!3A5#5H5c8r7c8{:{:V<]=m=@@q@TA8C0C=D', '_&7%k(:#O(E+J*U-0,Z-,/70D1]2Q2X4!536n7P7,92:T;I;q=f=4>t@/@0AED&EfFgG|G4HaH+JRKzLILnNIP<OkQJRqR1U'),
(6, '+%V#<(.(B)O)_,u+!.B-+.L/@2w2l4J5', 't$I&[#Q)e*Y*Q*b,*,.-E.R0k2J2z2!4a6N7b7;7*:T9e:u;e>-=K@JAd@lC;DMD', '_&7%k(:#O(E+J*U-0,Z-,/70D1]2Q2X4!536n7P7,92:T;I;q=f=4>t@/@0AED&EfFgG|G4HaH+JRKzLILnNIP<OkQJRqR1U'),
(7, '}%@&_#6(V(.*<*I-E-=-6.G1N0K3e4&3', 'W$%#J#4#T(Q)V*O,f.Y-A.x0Y2R244d486l5c6$9A8\\;c:D;(<6>$@??.A8BIDeE', 'i$W&o&%#b*n*M*@-w-s.L0%1}0V1\\4^4,6w6c8B8T:&:z:g=i<e>)?(@dBNACBbEiE}F|G?GTJ\\JALRKGL/NPNaQPQrQ-S&U'),
(8, 'Z%#&K#Q()*()L+,+D.v.k/!1N1Q1o3&4', 'a%t&/#<(:(++l,*,f,1.f/q04112R4R4B4=53818.8t:m:I=e<1=^>5@dAKCjD=E', 'Z%e&<(m(&(h)M+|+T.E/m0O1c0]3H3l3{4U5]7:9f8j90<<=+>9?<?Y?:A5A-B^EDFgE4G^IPHbJsKXK|M%NGN6P.P$QzSZT'),
(9, 'b%Z#x&X)))X*T,)-M.d/00+0!0#374q3y5V7Y8l7W8&9k;o;J=a?2>l?]AZAnCCE', '5$U%d&^)?*s*I,!-|,#/o.g1=0A1j3!3+5H6F7Q9R9&;*<v<L<1=J@7?zA.A]BCD', 'J$e%g&8):),)d+e,A,U.D0:0_2H1L2?3O6Q5;8K7j9]9<:K=>=J?B?G@$A]C?CbE}DFE;GaI!JvJ.J>M!L|NFPkO.QkR1T;T'),
(10, 'O$%#w&H)3(5*:+M+)-?/}/j0f1/3)4d4', 'l%9%F#r#Z*m+4,i+l.P._.&/z0N1m423M6z5O717&8J9\\<5;3=P>J@[@t@<B5C<E', 'a%5#y#W)})e*r+3+/.5/a.,0:1d252d3.6F5]8.9z859H;]=j>7>{?WAs@3B[BGE'),
(11, 'T&V&f(<#p)6+G*t+n.<-l0?080Q2b4a3', '!$&%G&8#N*^*#,G-g--.t.(0.1F2U2G556b6.7g9s8d;t;\\<Y<L?:?(AZ@TA2B,E', '_&7%k(:#O(E+J*U-0,Z-,/70D1]2Q2X4!536n7P7,92:T;I;q=f=4>t@/@0AED&EfFgG|G4HaH+JRKzLILnNIP<OkQJRqR1U'),
(12, 'r%D&v&1#d(b*9+D+>.m-p/M000m1<3J3', ',$D%B&.#1)X+?,T+&-^-K.2121I2u2i5L5[5D7I8b90:F<><m>K>3>(?ZBzBdB3D', '8%{&n&-)%*2*A*h,p,t-n.91N2!1.4=4e5k7t787A8W;k;u<H=4>[?PAOB<CXBfEQDWESH%I7J:ILKsKSN!N-NtPJRER^ScU'),
(13, 'o&.&Y&J)8*N+^,F+Q,x-j0G/C0|2S2x4', 'u%G#N#](Y(>*f*r+)-j.|/l/i1*3S2L466/5*6p8V:J9D:g;s=M?@>9@iB4C*D(E', 'Z&Q%l#S(1)))m+C-M.w.P0H/O083M4C5P555D688)81;(;i;#=S?_@;?t@SCaD9E%ECE6FSGRJwImL4MYNRNCOYQ1R@R)RTU'),
(14, '3%#%E#7#2*i)w*i,A,4/$.#/&2i1|3C5', 'o&,&@&h#W*s)8+]-=,#.8.*/Q0d2B4J5_4\\7Q6;8@:X:E:U=><j>3>eA^BWAQD^E', '&&c%<&V(i*%*X*p,(-S/k.m1b1d1c4F4g5L6T6k9S8H9K<r<k<q=h?3AOA]C.D(CEEIFkFhH_J(I8JiK6LqMhNeP<QERCRfT'),
(15, '@%2%(#X#Q)0)a+i,Y-6.)0\\0-183i2A5', 'H&l%t#u(#).+,+Y,0-e.!.^1#2f2K3S5r567v7[7o:<;B;>;G=C>O>:?I@eC9C)D', '_&7%k(:#O(E+J*U-0,Z-,/70D1]2Q2X4!536n7P7,92:T;I;q=f=4>t@/@0AED&EfFgG|G4HaH+JRKzLILnNIP<OkQJRqR1U'),
(17, 'V$s%##)(U(R*&*V-T.N-0.K0:1u1a405B5T5b8V9V:);<<J=.<l>u>TA@B{A2BBE', 'X%h#F&0)c)Y)*,t+N.v-_.s/|0:2*3-5o4X7Z6x7G9g9n;B=^<7?7>RA6B)CUD5E', 'i%6&C&8#W*v*<,2,c,c-2/H1Y2?154+5!536n7P7,92:T;I;q=f=4>t@/@0AED&EfFgG|G4HaH+JRKzLILnNIP<OkQJRqR1U'),
(18, 'x%N%%#*#z(y);*-+..2-c0x/i0\\1P4.4', 's%8#3#d)V)M)L,V+#,7/l/;/Z0z2I2S4@567$7G7$:O9k<-;d=q>C>z@A@=CsB{D', 'G%B&u#*#w)Z+e*(->-=.:0M/v0?2]4/5Y4T778e9@:L9!;0=\\<&>O>8?C@xBwC!DZE,EfH.GSJUI=KVKANqN>PnP)QZQiT=U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  ADD PRIMARY KEY (`id_wp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  MODIFY `id_wp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
