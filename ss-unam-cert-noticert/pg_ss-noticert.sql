--
-- PostgreSQL database dump
--

-- Dumped from database version 11.8 (Debian 11.8-1.pgdg100+1)
-- Dumped by pg_dump version 11.8 (Debian 11.8-1.pgdg100+1)

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
-- Name: noticias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.noticias (
    idnoticias integer NOT NULL,
    numeronoticias integer DEFAULT 0,
    fechas date
);


ALTER TABLE public.noticias OWNER TO postgres;

--
-- Name: noticias_idnoticias_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.noticias_idnoticias_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticias_idnoticias_seq OWNER TO postgres;

--
-- Name: noticias_idnoticias_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.noticias_idnoticias_seq OWNED BY public.noticias.idnoticias;


--
-- Name: noticias idnoticias; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticias ALTER COLUMN idnoticias SET DEFAULT nextval('public.noticias_idnoticias_seq'::regclass);


--
-- Data for Name: noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.noticias (idnoticias, numeronoticias, fechas) FROM stdin;
15	77	2020-10-05
11	17	2020-10-01
16	6	2020-10-06
14	4	2020-10-02
9	14	2020-09-28
10	10	2020-09-27
17	46	2020-10-07
\.


--
-- Name: noticias_idnoticias_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.noticias_idnoticias_seq', 17, true);


--
-- Name: noticias noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticias
    ADD CONSTRAINT noticias_pkey PRIMARY KEY (idnoticias);


--
-- PostgreSQL database dump complete
--

