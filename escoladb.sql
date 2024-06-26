toc.dat                                                                                             0000600 0004000 0002000 00000010424 14614514033 0014441 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP                           |            escola    12.18    12.18                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                    0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                    0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                    1262    16393    escola    DATABASE     �   CREATE DATABASE escola WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE escola;
                postgres    false         �            1259    16425    aluno    TABLE     �   CREATE TABLE public.aluno (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    nascimento date NOT NULL,
    turma_id integer NOT NULL
);
    DROP TABLE public.aluno;
       public         heap    postgres    false         �            1259    16423    aluno_id_seq    SEQUENCE     �   CREATE SEQUENCE public.aluno_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.aluno_id_seq;
       public          postgres    false    205                    0    0    aluno_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.aluno_id_seq OWNED BY public.aluno.id;
          public          postgres    false    204         �            1259    16412    turma    TABLE     `   CREATE TABLE public.turma (
    id integer NOT NULL,
    nome character varying(50) NOT NULL
);
    DROP TABLE public.turma;
       public         heap    postgres    false         �            1259    16410    turma_id_seq    SEQUENCE     �   CREATE SEQUENCE public.turma_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.turma_id_seq;
       public          postgres    false    203                    0    0    turma_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.turma_id_seq OWNED BY public.turma.id;
          public          postgres    false    202         �
           2604    16428    aluno id    DEFAULT     d   ALTER TABLE ONLY public.aluno ALTER COLUMN id SET DEFAULT nextval('public.aluno_id_seq'::regclass);
 7   ALTER TABLE public.aluno ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    204    205         �
           2604    16415    turma id    DEFAULT     d   ALTER TABLE ONLY public.turma ALTER COLUMN id SET DEFAULT nextval('public.turma_id_seq'::regclass);
 7   ALTER TABLE public.turma ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203                   0    16425    aluno 
   TABLE DATA           ?   COPY public.aluno (id, nome, nascimento, turma_id) FROM stdin;
    public          postgres    false    205       2828.dat 
          0    16412    turma 
   TABLE DATA           )   COPY public.turma (id, nome) FROM stdin;
    public          postgres    false    203       2826.dat            0    0    aluno_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.aluno_id_seq', 40, true);
          public          postgres    false    204                    0    0    turma_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.turma_id_seq', 14, true);
          public          postgres    false    202         �
           2606    16430    aluno aluno_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.aluno
    ADD CONSTRAINT aluno_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.aluno DROP CONSTRAINT aluno_pkey;
       public            postgres    false    205         �
           2606    16417    turma turma_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.turma
    ADD CONSTRAINT turma_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.turma DROP CONSTRAINT turma_pkey;
       public            postgres    false    203                                                                                                                                                                                                                                                    2828.dat                                                                                            0000600 0004000 0002000 00000001537 14614514033 0014264 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        11	Unidade01	2024-04-12	3
8	Dennis Editado	2024-04-25	11
3	Pedro	2010-11-10	7
1	João	2010-05-15	7
2	Maria	2011-02-20	9
7	Saulo	2024-04-05	9
12	Dennis	1985-03-12	7
13	Lana	1985-03-13	7
14	Paula	1985-03-14	7
15	Anderson	1985-03-15	7
16	Mario	1985-03-16	7
17	Gabriela	1985-03-17	7
18	Fernando	1985-03-18	7
19	Renato	1985-03-19	7
20	Carol	1985-03-21	7
21	Flavia	1985-03-22	7
22	Saulo Carneirinho	1985-03-24	7
23	Alessandro	1985-03-23	7
24	Romeu	1985-03-23	7
25	Juliena	1985-03-23	7
26	Hermanoteu	1985-03-23	7
27	Micalatéia	1985-03-23	7
28	Bilé da Biléia	1985-03-23	7
29	Jupira	1985-03-12	7
30	Adelaide	1985-03-13	7
31	Omar	1985-03-14	7
32	Rodrigo	1985-03-15	7
33	Diego	1985-03-16	7
34	Bernard	1985-03-17	7
35	Daniela	1985-03-18	7
36	Leandro	1985-03-19	7
37	Leonardo	1985-03-21	7
38	Francisco	1985-03-22	7
39	Vendedor	2024-05-03	11
40	Produto02	2024-05-10	14
\.


                                                                                                                                                                 2826.dat                                                                                            0000600 0004000 0002000 00000000101 14614514033 0014244 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        7	Turma07
9	Saulo
10	Saulo
11	Turma03
12	Saulo
14	Unidade01
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                               restore.sql                                                                                         0000600 0004000 0002000 00000007704 14614514033 0015375 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 12.18
-- Dumped by pg_dump version 12.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE escola;
--
-- Name: escola; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE escola WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


ALTER DATABASE escola OWNER TO postgres;

\connect escola

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: aluno; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aluno (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    nascimento date NOT NULL,
    turma_id integer NOT NULL
);


ALTER TABLE public.aluno OWNER TO postgres;

--
-- Name: aluno_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aluno_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aluno_id_seq OWNER TO postgres;

--
-- Name: aluno_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aluno_id_seq OWNED BY public.aluno.id;


--
-- Name: turma; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.turma (
    id integer NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.turma OWNER TO postgres;

--
-- Name: turma_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.turma_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.turma_id_seq OWNER TO postgres;

--
-- Name: turma_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.turma_id_seq OWNED BY public.turma.id;


--
-- Name: aluno id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluno ALTER COLUMN id SET DEFAULT nextval('public.aluno_id_seq'::regclass);


--
-- Name: turma id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turma ALTER COLUMN id SET DEFAULT nextval('public.turma_id_seq'::regclass);


--
-- Data for Name: aluno; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aluno (id, nome, nascimento, turma_id) FROM stdin;
\.
COPY public.aluno (id, nome, nascimento, turma_id) FROM '$$PATH$$/2828.dat';

--
-- Data for Name: turma; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.turma (id, nome) FROM stdin;
\.
COPY public.turma (id, nome) FROM '$$PATH$$/2826.dat';

--
-- Name: aluno_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aluno_id_seq', 40, true);


--
-- Name: turma_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.turma_id_seq', 14, true);


--
-- Name: aluno aluno_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aluno
    ADD CONSTRAINT aluno_pkey PRIMARY KEY (id);


--
-- Name: turma turma_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turma
    ADD CONSTRAINT turma_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            