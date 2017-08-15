--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.15
-- Dumped by pg_dump version 9.6.3

-- Started on 2017-08-11 11:37:02

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 8 (class 2615 OID 77108)
-- Name: hotel; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA hotel;


ALTER SCHEMA hotel OWNER TO postgres;

--
-- TOC entry 1 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2020 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 197 (class 1255 OID 102278)
-- Name: fu_bpiso(integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION fu_bpiso(pcodigo integer) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
ldescripcion text;
BEGIN

ldescripcion = (SELECT nro_piso ||'/'|| cant_hab from hotel.piso where id_piso=pcodigo);

RETURN ldescripcion;
END;
$$;


ALTER FUNCTION public.fu_bpiso(pcodigo integer) OWNER TO postgres;

--
-- TOC entry 190 (class 1255 OID 102277)
-- Name: fu_btipohabitacion(integer); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION fu_btipohabitacion(pcodigo integer) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
ldescripcion text;
BEGIN

ldescripcion = (SELECT tipo_nombre ||'/'|| tipo_abreviatura ||'/'||tipo_descripcion as tipohabitacion from hotel.tipo_habitacion where id_tipo_habitacion=pcodigo);

RETURN ldescripcion;
END;
$$;


ALTER FUNCTION public.fu_btipohabitacion(pcodigo integer) OWNER TO postgres;

SET search_path = hotel, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 181 (class 1259 OID 102230)
-- Name: det_piso; Type: TABLE; Schema: hotel; Owner: postgres
--

CREATE TABLE det_piso (
    id_det_hab integer NOT NULL,
    nro_hab integer,
    hab_estado character(1),
    eliminado boolean DEFAULT false NOT NULL,
    id_piso integer,
    id_tipo_habitacion integer
);


ALTER TABLE det_piso OWNER TO postgres;

--
-- TOC entry 2021 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN det_piso.hab_estado; Type: COMMENT; Schema: hotel; Owner: postgres
--

COMMENT ON COLUMN det_piso.hab_estado IS 'A:Alquilada
R:reservada
L:Libre';


--
-- TOC entry 180 (class 1259 OID 102228)
-- Name: det_piso_id_det_hab_seq; Type: SEQUENCE; Schema: hotel; Owner: postgres
--

CREATE SEQUENCE det_piso_id_det_hab_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE det_piso_id_det_hab_seq OWNER TO postgres;

--
-- TOC entry 2022 (class 0 OID 0)
-- Dependencies: 180
-- Name: det_piso_id_det_hab_seq; Type: SEQUENCE OWNED BY; Schema: hotel; Owner: postgres
--

ALTER SEQUENCE det_piso_id_det_hab_seq OWNED BY det_piso.id_det_hab;


--
-- TOC entry 177 (class 1259 OID 102186)
-- Name: piso; Type: TABLE; Schema: hotel; Owner: postgres
--

CREATE TABLE piso (
    id_piso integer NOT NULL,
    nro_piso integer,
    cant_hab integer,
    nro_hab_inicial bigint,
    fecha_registro date DEFAULT now(),
    eliminado boolean DEFAULT false NOT NULL
);


ALTER TABLE piso OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 102184)
-- Name: piso_id_piso_seq; Type: SEQUENCE; Schema: hotel; Owner: postgres
--

CREATE SEQUENCE piso_id_piso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE piso_id_piso_seq OWNER TO postgres;

--
-- TOC entry 2023 (class 0 OID 0)
-- Dependencies: 176
-- Name: piso_id_piso_seq; Type: SEQUENCE OWNED BY; Schema: hotel; Owner: postgres
--

ALTER SEQUENCE piso_id_piso_seq OWNED BY piso.id_piso;


--
-- TOC entry 183 (class 1259 OID 102264)
-- Name: precio_tipo_habitacion; Type: TABLE; Schema: hotel; Owner: postgres
--

CREATE TABLE precio_tipo_habitacion (
    id_precio_tipo_habitacion integer NOT NULL,
    precio_dia numeric(8,2),
    precio_hora numeric(8,2),
    eliminado boolean DEFAULT false NOT NULL,
    id_tipo_habitacion integer
);


ALTER TABLE precio_tipo_habitacion OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 102262)
-- Name: precio_tipo_habitacion_id_precio_tipo_habitacion_seq; Type: SEQUENCE; Schema: hotel; Owner: postgres
--

CREATE SEQUENCE precio_tipo_habitacion_id_precio_tipo_habitacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE precio_tipo_habitacion_id_precio_tipo_habitacion_seq OWNER TO postgres;

--
-- TOC entry 2024 (class 0 OID 0)
-- Dependencies: 182
-- Name: precio_tipo_habitacion_id_precio_tipo_habitacion_seq; Type: SEQUENCE OWNED BY; Schema: hotel; Owner: postgres
--

ALTER SEQUENCE precio_tipo_habitacion_id_precio_tipo_habitacion_seq OWNED BY precio_tipo_habitacion.id_precio_tipo_habitacion;


--
-- TOC entry 179 (class 1259 OID 102216)
-- Name: tipo_habitacion; Type: TABLE; Schema: hotel; Owner: postgres
--

CREATE TABLE tipo_habitacion (
    id_tipo_habitacion integer NOT NULL,
    tipo_nombre text,
    tipo_abreviatura character(2) DEFAULT 'IN'::bpchar NOT NULL,
    eliminado boolean DEFAULT false NOT NULL,
    tipo_descripcion text
);


ALTER TABLE tipo_habitacion OWNER TO postgres;

--
-- TOC entry 2025 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN tipo_habitacion.tipo_abreviatura; Type: COMMENT; Schema: hotel; Owner: postgres
--

COMMENT ON COLUMN tipo_habitacion.tipo_abreviatura IS 'IN:Indiviudal
MA:Matrimonial
HD:Habitacion Doble
HT:Habitacion Triple
';


--
-- TOC entry 2026 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN tipo_habitacion.tipo_descripcion; Type: COMMENT; Schema: hotel; Owner: postgres
--

COMMENT ON COLUMN tipo_habitacion.tipo_descripcion IS '
';


--
-- TOC entry 178 (class 1259 OID 102214)
-- Name: tipo_habitacion_id_tipo_habitacion_seq; Type: SEQUENCE; Schema: hotel; Owner: postgres
--

CREATE SEQUENCE tipo_habitacion_id_tipo_habitacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_habitacion_id_tipo_habitacion_seq OWNER TO postgres;

--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 178
-- Name: tipo_habitacion_id_tipo_habitacion_seq; Type: SEQUENCE OWNED BY; Schema: hotel; Owner: postgres
--

ALTER SEQUENCE tipo_habitacion_id_tipo_habitacion_seq OWNED BY tipo_habitacion.id_tipo_habitacion;


SET search_path = public, pg_catalog;

--
-- TOC entry 175 (class 1259 OID 102166)
-- Name: ubigeo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ubigeo (
    ubigeo_id integer NOT NULL,
    ubigeo_pais character varying(50) NOT NULL,
    ubigeo_departamento character varying(50) NOT NULL,
    ubigeo_provincia character varying(50) NOT NULL,
    ubigeo_distrito character varying(50) NOT NULL,
    ubigeo_eliminado boolean DEFAULT true NOT NULL,
    fecha_registro timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE ubigeo OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 102164)
-- Name: ubigeo_ubigeo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ubigeo_ubigeo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ubigeo_ubigeo_id_seq OWNER TO postgres;

--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 174
-- Name: ubigeo_ubigeo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ubigeo_ubigeo_id_seq OWNED BY ubigeo.ubigeo_id;


--
-- TOC entry 173 (class 1259 OID 77134)
-- Name: zona; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE zona (
    zonaid integer NOT NULL,
    codigo integer NOT NULL,
    descripcion text,
    eliminado boolean DEFAULT false NOT NULL,
    fechar_registro timestamp without time zone DEFAULT now() NOT NULL,
    CONSTRAINT "Ck_Zona_Descripcion" CHECK ((codigo = ANY (ARRAY[0, 1, 2])))
);


ALTER TABLE zona OWNER TO postgres;

--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN zona.eliminado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN zona.eliminado IS 'Si se encuentra eliminado o no.
FALSE: No eliminado 
TRUE: SI eliminado';


--
-- TOC entry 172 (class 1259 OID 77132)
-- Name: zona_zonaid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE zona_zonaid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE zona_zonaid_seq OWNER TO postgres;

--
-- TOC entry 2030 (class 0 OID 0)
-- Dependencies: 172
-- Name: zona_zonaid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE zona_zonaid_seq OWNED BY zona.zonaid;


SET search_path = hotel, pg_catalog;

--
-- TOC entry 1871 (class 2604 OID 102233)
-- Name: det_piso id_det_hab; Type: DEFAULT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY det_piso ALTER COLUMN id_det_hab SET DEFAULT nextval('det_piso_id_det_hab_seq'::regclass);


--
-- TOC entry 1865 (class 2604 OID 102189)
-- Name: piso id_piso; Type: DEFAULT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY piso ALTER COLUMN id_piso SET DEFAULT nextval('piso_id_piso_seq'::regclass);


--
-- TOC entry 1873 (class 2604 OID 102267)
-- Name: precio_tipo_habitacion id_precio_tipo_habitacion; Type: DEFAULT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY precio_tipo_habitacion ALTER COLUMN id_precio_tipo_habitacion SET DEFAULT nextval('precio_tipo_habitacion_id_precio_tipo_habitacion_seq'::regclass);


--
-- TOC entry 1868 (class 2604 OID 102219)
-- Name: tipo_habitacion id_tipo_habitacion; Type: DEFAULT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY tipo_habitacion ALTER COLUMN id_tipo_habitacion SET DEFAULT nextval('tipo_habitacion_id_tipo_habitacion_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- TOC entry 1862 (class 2604 OID 102169)
-- Name: ubigeo ubigeo_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ubigeo ALTER COLUMN ubigeo_id SET DEFAULT nextval('ubigeo_ubigeo_id_seq'::regclass);


--
-- TOC entry 1858 (class 2604 OID 77137)
-- Name: zona zonaid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY zona ALTER COLUMN zonaid SET DEFAULT nextval('zona_zonaid_seq'::regclass);


SET search_path = hotel, pg_catalog;

--
-- TOC entry 2010 (class 0 OID 102230)
-- Dependencies: 181
-- Data for Name: det_piso; Type: TABLE DATA; Schema: hotel; Owner: postgres
--

INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (17, 401, 'L', false, 4, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (18, 402, 'L', false, 4, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (19, 403, 'L', false, 4, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (1, 101, 'L', false, 1, 3);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (20, 404, 'L', false, 4, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (22, 405, 'L', false, 4, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (2, 201, 'L', false, 2, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (23, 406, 'L', false, 4, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (24, 407, 'L', false, 4, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (25, 408, 'L', false, 4, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (3, 202, 'L', false, 2, 4);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (4, 203, 'L', false, 2, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (5, 204, 'L', false, 2, 3);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (6, 205, 'L', false, 2, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (7, 206, 'L', false, 2, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (8, 207, 'L', false, 2, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (9, 301, 'L', false, 3, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (10, 302, 'L', false, 3, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (11, 303, 'L', false, 3, 1);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (12, 304, 'L', false, 3, 3);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (14, 305, 'L', false, 3, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (15, 306, 'L', false, 3, 2);
INSERT INTO det_piso (id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion) VALUES (16, 307, 'L', false, 3, 2);


--
-- TOC entry 2031 (class 0 OID 0)
-- Dependencies: 180
-- Name: det_piso_id_det_hab_seq; Type: SEQUENCE SET; Schema: hotel; Owner: postgres
--

SELECT pg_catalog.setval('det_piso_id_det_hab_seq', 25, true);


--
-- TOC entry 2006 (class 0 OID 102186)
-- Dependencies: 177
-- Data for Name: piso; Type: TABLE DATA; Schema: hotel; Owner: postgres
--

INSERT INTO piso (id_piso, nro_piso, cant_hab, nro_hab_inicial, fecha_registro, eliminado) VALUES (1, 1, 1, 101, NULL, false);
INSERT INTO piso (id_piso, nro_piso, cant_hab, nro_hab_inicial, fecha_registro, eliminado) VALUES (2, 2, 7, 201, NULL, false);
INSERT INTO piso (id_piso, nro_piso, cant_hab, nro_hab_inicial, fecha_registro, eliminado) VALUES (3, 3, 7, 301, NULL, false);
INSERT INTO piso (id_piso, nro_piso, cant_hab, nro_hab_inicial, fecha_registro, eliminado) VALUES (4, 4, 8, 401, NULL, false);


--
-- TOC entry 2032 (class 0 OID 0)
-- Dependencies: 176
-- Name: piso_id_piso_seq; Type: SEQUENCE SET; Schema: hotel; Owner: postgres
--

SELECT pg_catalog.setval('piso_id_piso_seq', 4, true);


--
-- TOC entry 2012 (class 0 OID 102264)
-- Dependencies: 183
-- Data for Name: precio_tipo_habitacion; Type: TABLE DATA; Schema: hotel; Owner: postgres
--

INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (1, 40.00, 20.00, false, 1);
INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (2, 50.00, 25.00, false, 2);
INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (3, 65.00, NULL, false, 3);
INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (4, 75.00, NULL, false, 3);
INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (5, 75.00, NULL, false, 4);
INSERT INTO precio_tipo_habitacion (id_precio_tipo_habitacion, precio_dia, precio_hora, eliminado, id_tipo_habitacion) VALUES (6, 85.00, NULL, false, 4);


--
-- TOC entry 2033 (class 0 OID 0)
-- Dependencies: 182
-- Name: precio_tipo_habitacion_id_precio_tipo_habitacion_seq; Type: SEQUENCE SET; Schema: hotel; Owner: postgres
--

SELECT pg_catalog.setval('precio_tipo_habitacion_id_precio_tipo_habitacion_seq', 6, true);


--
-- TOC entry 2008 (class 0 OID 102216)
-- Dependencies: 179
-- Data for Name: tipo_habitacion; Type: TABLE DATA; Schema: hotel; Owner: postgres
--

INSERT INTO tipo_habitacion (id_tipo_habitacion, tipo_nombre, tipo_abreviatura, eliminado, tipo_descripcion) VALUES (1, 'INDIVIDUAL', 'IN', false, 'CAMA DE PLAZA Y MEDIA PARA UNA PERSONA');
INSERT INTO tipo_habitacion (id_tipo_habitacion, tipo_nombre, tipo_abreviatura, eliminado, tipo_descripcion) VALUES (2, 'MATRIMONIAL', 'MA', false, 'CAMA DE 2 PLAZAS HASTA 2 PERSONAS');
INSERT INTO tipo_habitacion (id_tipo_habitacion, tipo_nombre, tipo_abreviatura, eliminado, tipo_descripcion) VALUES (3, 'HABITACION DOBLE', 'HD', false, 'HABITACION CON DOS CAMAS HASTA 3 PERSONAS');
INSERT INTO tipo_habitacion (id_tipo_habitacion, tipo_nombre, tipo_abreviatura, eliminado, tipo_descripcion) VALUES (4, 'HABITACION TRIPLE', 'HT', false, 'HABITACION CON 3 CAMAS HASTA 4 PERSONAS');


--
-- TOC entry 2034 (class 0 OID 0)
-- Dependencies: 178
-- Name: tipo_habitacion_id_tipo_habitacion_seq; Type: SEQUENCE SET; Schema: hotel; Owner: postgres
--

SELECT pg_catalog.setval('tipo_habitacion_id_tipo_habitacion_seq', 4, true);


SET search_path = public, pg_catalog;

--
-- TOC entry 2004 (class 0 OID 102166)
-- Dependencies: 175
-- Data for Name: ubigeo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ubigeo (ubigeo_id, ubigeo_pais, ubigeo_departamento, ubigeo_provincia, ubigeo_distrito, ubigeo_eliminado, fecha_registro) VALUES (1, 'jjjj', 'Amazonas', 'Chachapoyas', 'Mi Perú', false, '2017-08-03 21:05:25.442');
INSERT INTO ubigeo (ubigeo_id, ubigeo_pais, ubigeo_departamento, ubigeo_provincia, ubigeo_distrito, ubigeo_eliminado, fecha_registro) VALUES (2, 'jj', 'Amazonas', 'Chachapoyas', 'Mi Perú', false, '2017-08-03 21:05:41.76');


--
-- TOC entry 2035 (class 0 OID 0)
-- Dependencies: 174
-- Name: ubigeo_ubigeo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ubigeo_ubigeo_id_seq', 2, true);


--
-- TOC entry 2002 (class 0 OID 77134)
-- Dependencies: 173
-- Data for Name: zona; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (1, 1, 'w', false, '2017-07-12 22:14:48.581');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (2, 1, 'ss', false, '2017-07-12 22:15:37.923');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (3, 1, 't', false, '2017-07-12 22:41:55.739');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (4, 1, 'er', false, '2017-07-12 22:44:32.351');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (5, 1, 'r', false, '2017-07-12 22:47:38.284');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (6, 1, 'gg', false, '2017-07-12 22:53:35.396');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (7, 1, 'a', false, '2017-07-30 11:38:28.482');
INSERT INTO zona (zonaid, codigo, descripcion, eliminado, fechar_registro) VALUES (8, 1, 'a', false, '2017-08-10 22:03:57.604');


--
-- TOC entry 2036 (class 0 OID 0)
-- Dependencies: 172
-- Name: zona_zonaid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('zona_zonaid_seq', 8, true);


SET search_path = hotel, pg_catalog;

--
-- TOC entry 1887 (class 2606 OID 102236)
-- Name: det_piso pk_det_hab; Type: CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY det_piso
    ADD CONSTRAINT pk_det_hab PRIMARY KEY (id_det_hab);


--
-- TOC entry 1881 (class 2606 OID 102192)
-- Name: piso pk_piso; Type: CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY piso
    ADD CONSTRAINT pk_piso PRIMARY KEY (id_piso);


--
-- TOC entry 1890 (class 2606 OID 102270)
-- Name: precio_tipo_habitacion pk_precio_tipo_habitacion; Type: CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY precio_tipo_habitacion
    ADD CONSTRAINT pk_precio_tipo_habitacion PRIMARY KEY (id_precio_tipo_habitacion);


--
-- TOC entry 1884 (class 2606 OID 102226)
-- Name: tipo_habitacion pk_tipo_habitacion; Type: CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY tipo_habitacion
    ADD CONSTRAINT pk_tipo_habitacion PRIMARY KEY (id_tipo_habitacion);


SET search_path = public, pg_catalog;

--
-- TOC entry 1878 (class 2606 OID 102173)
-- Name: ubigeo Pk_Ubigeo; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ubigeo
    ADD CONSTRAINT "Pk_Ubigeo" PRIMARY KEY (ubigeo_id);


--
-- TOC entry 1876 (class 2606 OID 77145)
-- Name: zona Pk_Zona; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY zona
    ADD CONSTRAINT "Pk_Zona" PRIMARY KEY (zonaid);


SET search_path = hotel, pg_catalog;

--
-- TOC entry 1885 (class 1259 OID 102247)
-- Name: chk_unique_nro_hab; Type: INDEX; Schema: hotel; Owner: postgres
--

CREATE UNIQUE INDEX chk_unique_nro_hab ON det_piso USING btree (nro_hab, eliminado);


--
-- TOC entry 1879 (class 1259 OID 102193)
-- Name: chk_unique_nro_piso; Type: INDEX; Schema: hotel; Owner: postgres
--

CREATE UNIQUE INDEX chk_unique_nro_piso ON piso USING btree (nro_piso, eliminado);


--
-- TOC entry 1888 (class 1259 OID 102276)
-- Name: chk_unique_precio_tipo_hab; Type: INDEX; Schema: hotel; Owner: postgres
--

CREATE UNIQUE INDEX chk_unique_precio_tipo_hab ON precio_tipo_habitacion USING btree (precio_dia, precio_hora, eliminado, id_tipo_habitacion);


--
-- TOC entry 1882 (class 1259 OID 102227)
-- Name: chk_unique_tipo_nombre; Type: INDEX; Schema: hotel; Owner: postgres
--

CREATE INDEX chk_unique_tipo_nombre ON tipo_habitacion USING btree (tipo_nombre, eliminado);


--
-- TOC entry 1892 (class 2606 OID 102242)
-- Name: det_piso fk_det_hab_tipo_habitacion; Type: FK CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY det_piso
    ADD CONSTRAINT fk_det_hab_tipo_habitacion FOREIGN KEY (id_tipo_habitacion) REFERENCES tipo_habitacion(id_tipo_habitacion);


--
-- TOC entry 1891 (class 2606 OID 102237)
-- Name: det_piso fk_piso_det_piso; Type: FK CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY det_piso
    ADD CONSTRAINT fk_piso_det_piso FOREIGN KEY (id_piso) REFERENCES piso(id_piso);


--
-- TOC entry 1893 (class 2606 OID 102271)
-- Name: precio_tipo_habitacion fk_precio_tipo_habitacion_tipo_habitacion; Type: FK CONSTRAINT; Schema: hotel; Owner: postgres
--

ALTER TABLE ONLY precio_tipo_habitacion
    ADD CONSTRAINT fk_precio_tipo_habitacion_tipo_habitacion FOREIGN KEY (id_tipo_habitacion) REFERENCES tipo_habitacion(id_tipo_habitacion);


--
-- TOC entry 2019 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-08-11 11:37:02

--
-- PostgreSQL database dump complete
--

