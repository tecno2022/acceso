--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.25
-- Dumped by pg_dump version 10.18 (Ubuntu 10.18-0ubuntu0.18.04.1)

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

SET default_with_oids = false;

--
-- Name: departamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departamento (
    id_departamento integer NOT NULL,
    ofic character(2),
    descripcion character varying(100)
);


ALTER TABLE public.departamento OWNER TO postgres;

--
-- Name: departamento_id_departamento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.departamento_id_departamento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamento_id_departamento_seq OWNER TO postgres;

--
-- Name: departamento_id_departamento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.departamento_id_departamento_seq OWNED BY public.departamento.id_departamento;


--
-- Name: departamento id_departamento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departamento ALTER COLUMN id_departamento SET DEFAULT nextval('public.departamento_id_departamento_seq'::regclass);


--
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.departamento (id_departamento, ofic, descripcion) FROM stdin;
1	10	POYO SOCIO - ADMINISTRATIVO
2	10	CULTURA
3	10	PLANIFICACION ESTRATEGICA
4	10	SOCIO - ACADEMICA
5	10	DEPORTE
6	12	VICERRECTORADO DE DESARROLLO TERRITORIAL
7	10	SEGURIDAD INTEGRAL
8	10	AUDITORIA INTERNA
9	10	CURRICULO
10	11	PRODUCCION Y RECREACION DE SABERES
11	10	TALENTO HUMANO
12	13	INGRESO, PROSECUCION Y EGRESO ESTUDIANTIL
13	10	APOYO SOCIO - ADMINISTRATIVO
14	13	SERVICIOS ESTUDIANTILES
15	10	SOCIO - ACADEMICA
16	13	BIENESTAR ESTUDIANTIL
17	10	DEPORTE
18	11	PROMOCION Y DIVULGACION DE SABERES
19	10	RECTORADO
20	10	TECNOLOGIA DE INFORMACION Y TELECOMUNICACIONES
21	10	INTEGRACION SOCIO - EDUCATIVA
22	10	CENTRO DE ESTUDIOS
23	10	SOCIO - ACADEMICA
24	10	CENTRO DE ESTUDIOS
25	10	CENTRO DE ESTUDIOS
26	11	DESARROLLO DE LOS TRABAJADORES ACADEMICOS
27	11	VICERRECTORADO
28	11	PRODUCCION Y RECREACION DE SABERES
29	10	DESARROLLO Y MANTENIMIENTO DE PLANTA FISICA
30	11	VICERRECTORADO
31	13	ARCHIVO CENTRAL E HISTORICO
32	10	DESARROLLO Y MANTENIMIENTO DE PLANTA FISICA
33	10	SALUD INTEGRAL
34	12	VICERRECTORADO DE DESARROLLO TERRITORIAL
35	13	SECRETARIA GENERAL
36	13	DESEMPEÑO ESTUDIANTIL
37	10	CIVICO - MILITAR
38	13	DESEMPEÑO ESTUDIANTIL
39	13	SECRETARIA GENERAL
40	11	PROMOCION Y DIVULGACION DE SABERES
41	10	COMUNICACION Y PROYECCION UNIVERSITARIA
42	13	INGRESO, PROSECUCION Y EGRESO ESTUDIANTIL
43	10	CULTURA
44	10	SOCIO - ACADEMICA
45	10	RECTORADO
46	10	SEGURIDAD INTEGRAL
47	10	CONSULTORIA JURIDICA
48	10	INTEGRACION SOCIO - EDUCATIVA
49	13	SERVICIOS ESTUDIANTILES
50	10	CURRICULO
51	11	VICERRECTORADO
52	10	SALUD INTEGRAL
53	10	TALENTO HUMANO
54	10	RECTORADO
55	10	CENTRO DE ESTUDIOS
56	13	INGRESO, PROSECUCION Y EGRESO ESTUDIANTIL
\.


--
-- Name: departamento_id_departamento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.departamento_id_departamento_seq', 56, true);


--
-- Name: departamento departamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (id_departamento);


--
-- PostgreSQL database dump complete
--

