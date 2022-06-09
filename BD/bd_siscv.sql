--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.25
-- Dumped by pg_dump version 10.16 (Ubuntu 10.16-0ubuntu0.18.04.1)

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

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: departamento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departamento (
    id_departamento integer NOT NULL,
    descripcion character varying(145)
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
-- Name: pase; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pase (
    id_pase integer NOT NULL,
    descripcion character varying(145)
);


ALTER TABLE public.pase OWNER TO postgres;

--
-- Name: pase_id_pase_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pase_id_pase_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pase_id_pase_seq OWNER TO postgres;

--
-- Name: pase_id_pase_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pase_id_pase_seq OWNED BY public.pase.id_pase;


--
-- Name: persona; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona (
    id_persona integer NOT NULL,
    cedula character varying(25),
    nombres character varying(145),
    apellidos character varying(145),
    telefono character varying(25),
    nacionalidad character varying(25),
    genero character varying(25),
    documento character varying(145),
    id_persona_tipo integer
);


ALTER TABLE public.persona OWNER TO postgres;

--
-- Name: persona_id_persona_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_id_persona_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_id_persona_seq OWNER TO postgres;

--
-- Name: persona_id_persona_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.persona_id_persona_seq OWNED BY public.persona.id_persona;


--
-- Name: persona_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona_tipo (
    id_persona_tipo integer NOT NULL,
    descripcion character varying(45)
);


ALTER TABLE public.persona_tipo OWNER TO postgres;

--
-- Name: persona_tipo_id_persona_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_tipo_id_persona_tipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_tipo_id_persona_tipo_seq OWNER TO postgres;

--
-- Name: persona_tipo_id_persona_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.persona_tipo_id_persona_tipo_seq OWNED BY public.persona_tipo.id_persona_tipo;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    usuario character varying(45),
    password character varying(145),
    fecha_registro date,
    estatus character varying(5),
    id_departamento integer,
    id_persona integer,
    id_usuario_perfil integer
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- Name: usuario_perfil; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_perfil (
    id_usuario_perfil integer NOT NULL,
    descripcion character varying(45)
);


ALTER TABLE public.usuario_perfil OWNER TO postgres;

--
-- Name: usuario_perfil_id_usuario_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_perfil_id_usuario_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_perfil_id_usuario_perfil_seq OWNER TO postgres;

--
-- Name: usuario_perfil_id_usuario_perfil_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_perfil_id_usuario_perfil_seq OWNED BY public.usuario_perfil.id_usuario_perfil;


--
-- Name: visitante; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.visitante (
    id_visitante integer NOT NULL,
    motivo character varying(45),
    paquete character varying(45),
    observacion text,
    id_departamento integer,
    id_persona integer,
    id_pase integer
);


ALTER TABLE public.visitante OWNER TO postgres;

--
-- Name: visitante_detalle; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.visitante_detalle (
    id_visitante_detalle integer NOT NULL,
    estatus character varying(5),
    fecha timestamp without time zone,
    id_visitante integer,
    id_usuario integer
);


ALTER TABLE public.visitante_detalle OWNER TO postgres;

--
-- Name: visitante_detalle_id_visitante_detalle_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.visitante_detalle_id_visitante_detalle_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.visitante_detalle_id_visitante_detalle_seq OWNER TO postgres;

--
-- Name: visitante_detalle_id_visitante_detalle_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.visitante_detalle_id_visitante_detalle_seq OWNED BY public.visitante_detalle.id_visitante_detalle;


--
-- Name: visitante_id_visitante_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.visitante_id_visitante_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.visitante_id_visitante_seq OWNER TO postgres;

--
-- Name: visitante_id_visitante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.visitante_id_visitante_seq OWNED BY public.visitante.id_visitante;


--
-- Name: departamento id_departamento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departamento ALTER COLUMN id_departamento SET DEFAULT nextval('public.departamento_id_departamento_seq'::regclass);


--
-- Name: pase id_pase; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pase ALTER COLUMN id_pase SET DEFAULT nextval('public.pase_id_pase_seq'::regclass);


--
-- Name: persona id_persona; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona ALTER COLUMN id_persona SET DEFAULT nextval('public.persona_id_persona_seq'::regclass);


--
-- Name: persona_tipo id_persona_tipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_tipo ALTER COLUMN id_persona_tipo SET DEFAULT nextval('public.persona_tipo_id_persona_tipo_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- Name: usuario_perfil id_usuario_perfil; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_perfil ALTER COLUMN id_usuario_perfil SET DEFAULT nextval('public.usuario_perfil_id_usuario_perfil_seq'::regclass);


--
-- Name: visitante id_visitante; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante ALTER COLUMN id_visitante SET DEFAULT nextval('public.visitante_id_visitante_seq'::regclass);


--
-- Name: visitante_detalle id_visitante_detalle; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante_detalle ALTER COLUMN id_visitante_detalle SET DEFAULT nextval('public.visitante_detalle_id_visitante_detalle_seq'::regclass);


--
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.departamento (id_departamento, descripcion) FROM stdin;
\.


--
-- Data for Name: pase; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pase (id_pase, descripcion) FROM stdin;
\.


--
-- Data for Name: persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona (id_persona, cedula, nombres, apellidos, telefono, nacionalidad, genero, documento, id_persona_tipo) FROM stdin;
\.


--
-- Data for Name: persona_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona_tipo (id_persona_tipo, descripcion) FROM stdin;
1	Personal UBV
2	Visitante
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id_usuario, usuario, password, fecha_registro, estatus, id_departamento, id_persona, id_usuario_perfil) FROM stdin;
\.


--
-- Data for Name: usuario_perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario_perfil (id_usuario_perfil, descripcion) FROM stdin;
1	Administrador
2	Personal de Seguridad
\.


--
-- Data for Name: visitante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.visitante (id_visitante, motivo, paquete, observacion, id_departamento, id_persona, id_pase) FROM stdin;
\.


--
-- Data for Name: visitante_detalle; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.visitante_detalle (id_visitante_detalle, estatus, fecha, id_visitante, id_usuario) FROM stdin;
\.


--
-- Name: departamento_id_departamento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.departamento_id_departamento_seq', 1, false);


--
-- Name: pase_id_pase_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pase_id_pase_seq', 1, false);


--
-- Name: persona_id_persona_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_id_persona_seq', 1, false);


--
-- Name: persona_tipo_id_persona_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_tipo_id_persona_tipo_seq', 2, true);


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 1, false);


--
-- Name: usuario_perfil_id_usuario_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_perfil_id_usuario_perfil_seq', 2, true);


--
-- Name: visitante_detalle_id_visitante_detalle_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visitante_detalle_id_visitante_detalle_seq', 1, false);


--
-- Name: visitante_id_visitante_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.visitante_id_visitante_seq', 1, false);


--
-- Name: departamento departamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (id_departamento);


--
-- Name: pase pase_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pase
    ADD CONSTRAINT pase_pkey PRIMARY KEY (id_pase);


--
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id_persona);


--
-- Name: persona_tipo persona_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona_tipo
    ADD CONSTRAINT persona_tipo_pkey PRIMARY KEY (id_persona_tipo);


--
-- Name: usuario_perfil usuario_perfil_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_perfil
    ADD CONSTRAINT usuario_perfil_pkey PRIMARY KEY (id_usuario_perfil);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: visitante_detalle visitante_detalle_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante_detalle
    ADD CONSTRAINT visitante_detalle_pkey PRIMARY KEY (id_visitante_detalle);


--
-- Name: visitante visitante_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante
    ADD CONSTRAINT visitante_pkey PRIMARY KEY (id_visitante);


--
-- Name: persona persona_id_persona_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_id_persona_tipo_fkey FOREIGN KEY (id_persona_tipo) REFERENCES public.persona_tipo(id_persona_tipo);


--
-- Name: usuario usuario_id_departamento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_departamento_fkey FOREIGN KEY (id_departamento) REFERENCES public.departamento(id_departamento);


--
-- Name: usuario usuario_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES public.persona(id_persona);


--
-- Name: usuario usuario_id_usuario_perfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_usuario_perfil_fkey FOREIGN KEY (id_usuario_perfil) REFERENCES public.usuario_perfil(id_usuario_perfil);


--
-- Name: visitante_detalle visitante_detalle_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante_detalle
    ADD CONSTRAINT visitante_detalle_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario);


--
-- Name: visitante_detalle visitante_detalle_id_visitante_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante_detalle
    ADD CONSTRAINT visitante_detalle_id_visitante_fkey FOREIGN KEY (id_visitante) REFERENCES public.visitante(id_visitante);


--
-- Name: visitante visitante_id_departamento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante
    ADD CONSTRAINT visitante_id_departamento_fkey FOREIGN KEY (id_departamento) REFERENCES public.departamento(id_departamento);


--
-- Name: visitante visitante_id_pase_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante
    ADD CONSTRAINT visitante_id_pase_fkey FOREIGN KEY (id_pase) REFERENCES public.pase(id_pase);


--
-- Name: visitante visitante_id_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.visitante
    ADD CONSTRAINT visitante_id_persona_fkey FOREIGN KEY (id_persona) REFERENCES public.persona(id_persona);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

