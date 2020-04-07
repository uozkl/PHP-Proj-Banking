--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.17
-- Dumped by pg_dump version 12.0

-- Started on 2020-04-07 19:41:17

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
-- TOC entry 2145 (class 1262 OID 24584)
-- Name: web_proj; Type: DATABASE; Schema: -; Owner: -
--

CREATE DATABASE web_proj WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_GB.UTF-8' LC_CTYPE = 'en_GB.UTF-8';


\connect web_proj

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
-- TOC entry 187 (class 1259 OID 24631)
-- Name: account; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.account (
    user_id integer NOT NULL,
    user_name character varying,
    user_passwd character varying,
    user_fname character varying,
    user_lname character varying,
    user_gender character varying,
    user_tel character varying,
    user_address character varying,
    user_email character varying
);


--
-- TOC entry 185 (class 1259 OID 24601)
-- Name: card_info; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.card_info (
    card_id integer NOT NULL,
    user_id integer,
    card_type character varying,
    card_number character varying,
    card_institution character varying
);


--
-- TOC entry 186 (class 1259 OID 24609)
-- Name: transaction_info; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.transaction_info (
    transaction_id integer NOT NULL,
    card_id integer,
    transaction_name character varying,
    transaction_date integer,
    transaction_type character varying,
    transaction_outflow integer,
    transaction_inflow integer,
    transaction_dest character varying,
    transaction_note character varying
);


--
-- TOC entry 2139 (class 0 OID 24631)
-- Dependencies: 187
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.account (user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) VALUES (2, 'user2', 'user2', 'John', 'Doe', 'Male', '1112225544', '331 Test Street', 'user2@test.com');
INSERT INTO public.account (user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) VALUES (3, 'user3', 'user3', 'Jane', 'Doe', 'Female', '9996665555', '5534 Test Street', 'user3@test.com');
INSERT INTO public.account (user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) VALUES (1, 'user1', 'user1', 'John', 'Smith', 'Male', '10086', '221 Test Street', 'user1@test.com');


--
-- TOC entry 2137 (class 0 OID 24601)
-- Dependencies: 185
-- Data for Name: card_info; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (3, 1, 'Credit', '7897897654', 'Bank of KM');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (4, 1, 'Savings', '7897845458', 'PPM Savings');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (5, 1, 'Savings', '4534546789', 'Bank of OO');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (6, 1, 'Cash', '1234568742', 'Bank of KP');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (7, 2, 'Cash', '4501231378', 'None');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (9, 2, 'Credit', '8784561231', 'Bank of VD');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (10, 3, 'Credit', '4561237897', 'Bank of V3D');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (0, NULL, NULL, NULL, NULL);
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (1, 1, 'Credit', '4567486876', 'Bank of OODD');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (2, 1, 'Credit', '7685535123', 'Bank of CSDF');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (11, 1, 'Credit', '3543153452', 'FFFF');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (12, 1, 'Loan', '34543452', 'JKLJKL');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (8, 1, 'Loan', '1231238751', 'Nowhere');
INSERT INTO public.card_info (card_id, user_id, card_type, card_number, card_institution) VALUES (13, 1, 'Credit', '32144123', 'asdf');


--
-- TOC entry 2138 (class 0 OID 24609)
-- Dependencies: 186
-- Data for Name: transaction_info; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (0, NULL, 'New Transition', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (8, 1, 'Another Junk', 20200715, 'Withdraw', 781, 12, 'Gov', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (1, 1, 'No Title', 20200105, 'Withdraw', 782, 1210, 'Store', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (7, 1, 'Junk', 20200202, 'Deposit', 541, NULL, 'Ann', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (9, 8, 'New Transitionsdf', 20200404, 'asdf', 1, 123, 'ddd', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (3, 3, 'SS', 20191101, 'Payment', 85, NULL, 'Joe', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (4, 4, 'ZZ', 20180605, 'Bill', 12, NULL, 'Jack', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (5, 5, 'XX', 20190706, 'Bill', 333, NULL, 'Jame', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (2, 2, 'AA', 20201103, 'Withdraw', NULL, 20, 'Jane', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (10, 11, 'New Transition5254', 20200411, '1212', 25, 11, '2474', NULL);
INSERT INTO public.transaction_info (transaction_id, card_id, transaction_name, transaction_date, transaction_type, transaction_outflow, transaction_inflow, transaction_dest, transaction_note) VALUES (6, 6, 'EE', 20130516, 'Bill', 55, 77, 'Jone', NULL);


--
-- TOC entry 2019 (class 2606 OID 24638)
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (user_id);


--
-- TOC entry 2015 (class 2606 OID 24608)
-- Name: card_info card_info_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.card_info
    ADD CONSTRAINT card_info_pkey PRIMARY KEY (card_id);


--
-- TOC entry 2017 (class 2606 OID 24616)
-- Name: transaction_info transaction_info_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.transaction_info
    ADD CONSTRAINT transaction_info_pkey PRIMARY KEY (transaction_id);


-- Completed on 2020-04-07 19:41:18

--
-- PostgreSQL database dump complete
--

