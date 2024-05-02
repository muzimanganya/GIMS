--
-- PostgreSQL database dump
--

-- Dumped from database version 14.1 (Ubuntu 14.1-2.pgdg20.04+1)
-- Dumped by pg_dump version 14.1 (Ubuntu 14.1-2.pgdg20.04+1)

-- Started on 2021-12-27 14:32:59 EAT

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
-- TOC entry 209 (class 1259 OID 115679)
-- Name: agent_cards_distribution; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.agent_cards_distribution (
    card character varying(200) NOT NULL,
    agent bigint NOT NULL,
    received_at bigint,
    is_returned boolean NOT NULL,
    created_at bigint NOT NULL,
    updated_at bigint NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL
);


--
-- TOC entry 210 (class 1259 OID 115682)
-- Name: buses; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.buses (
    plate_number character varying(100) NOT NULL,
    label character varying
);


--
-- TOC entry 211 (class 1259 OID 115687)
-- Name: card_usages; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.card_usages (
    id bigint NOT NULL,
    card character varying(100) NOT NULL,
    bus character varying(100) NOT NULL,
    boarding_time bigint NOT NULL
);


--
-- TOC entry 212 (class 1259 OID 115690)
-- Name: card_usages_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.card_usages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3428 (class 0 OID 0)
-- Dependencies: 212
-- Name: card_usages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.card_usages_id_seq OWNED BY public.card_usages.id;


--
-- TOC entry 213 (class 1259 OID 115691)
-- Name: cards; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cards (
    id character varying(200) NOT NULL,
    label character varying(100),
    card_owner bigint,
    status bigint NOT NULL,
    expires_on date,
    agent bigint,
    created_at bigint,
    assigned_at bigint,
    created_by bigint,
    assigned_by bigint
);


--
-- TOC entry 214 (class 1259 OID 115694)
-- Name: cards_selling_history; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cards_selling_history (
    card character varying(200) NOT NULL,
    seller bigint NOT NULL,
    owner bigint NOT NULL,
    price bigint NOT NULL,
    currency character varying(3) NOT NULL,
    sold_at bigint NOT NULL
);


--
-- TOC entry 215 (class 1259 OID 115697)
-- Name: cards_subscription; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cards_subscription (
    id bigint NOT NULL,
    card character varying(100) NOT NULL,
    days bigint NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    amount bigint NOT NULL,
    currency character varying(3) NOT NULL
);


--
-- TOC entry 216 (class 1259 OID 115700)
-- Name: cards_subscription_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cards_subscription_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3429 (class 0 OID 0)
-- Dependencies: 216
-- Name: cards_subscription_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cards_subscription_id_seq OWNED BY public.cards_subscription.id;


--
-- TOC entry 217 (class 1259 OID 115701)
-- Name: cities; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cities (
    id bigint NOT NULL,
    province bigint NOT NULL,
    name character varying(100) NOT NULL,
    is_active boolean NOT NULL
);


--
-- TOC entry 218 (class 1259 OID 115704)
-- Name: cities_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3430 (class 0 OID 0)
-- Dependencies: 218
-- Name: cities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cities_id_seq OWNED BY public.cities.id;


--
-- TOC entry 219 (class 1259 OID 115705)
-- Name: faculties; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.faculties (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    is_active boolean NOT NULL
);


--
-- TOC entry 220 (class 1259 OID 115708)
-- Name: faculties_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.faculties_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3431 (class 0 OID 0)
-- Dependencies: 220
-- Name: faculties_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.faculties_id_seq OWNED BY public.faculties.id;


--
-- TOC entry 221 (class 1259 OID 115709)
-- Name: institutions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.institutions (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    is_active boolean NOT NULL
);


--
-- TOC entry 222 (class 1259 OID 115712)
-- Name: institutions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.institutions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3432 (class 0 OID 0)
-- Dependencies: 222
-- Name: institutions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.institutions_id_seq OWNED BY public.institutions.id;


--
-- TOC entry 223 (class 1259 OID 115713)
-- Name: migration; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


--
-- TOC entry 224 (class 1259 OID 115716)
-- Name: provinces; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.provinces (
    id bigint NOT NULL,
    name character varying(100) NOT NULL,
    is_active boolean NOT NULL
);


--
-- TOC entry 225 (class 1259 OID 115719)
-- Name: provinces_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.provinces_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3433 (class 0 OID 0)
-- Dependencies: 225
-- Name: provinces_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.provinces_id_seq OWNED BY public.provinces.id;


--
-- TOC entry 226 (class 1259 OID 115720)
-- Name: subscription_pricing; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.subscription_pricing (
    id bigint NOT NULL,
    number_of_days bigint NOT NULL,
    amount bigint NOT NULL,
    created_at bigint NOT NULL,
    updated_at bigint NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL
);


--
-- TOC entry 227 (class 1259 OID 115723)
-- Name: subscription_pricing_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.subscription_pricing_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3434 (class 0 OID 0)
-- Dependencies: 227
-- Name: subscription_pricing_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.subscription_pricing_id_seq OWNED BY public.subscription_pricing.id;


--
-- TOC entry 228 (class 1259 OID 115724)
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    first_name character varying(100) NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    token_id character varying(100),
    is_active boolean NOT NULL,
    middle_name character varying(100),
    last_name character varying(100),
    gender character varying(1),
    date_of_birth date,
    institution bigint,
    faculty bigint,
    city bigint,
    card character varying(100),
    lang character varying(10),
    role bigint,
    created_at bigint NOT NULL,
    updated_at bigint NOT NULL,
    created_by bigint,
    updated_by bigint
);


--
-- TOC entry 229 (class 1259 OID 115729)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3435 (class 0 OID 0)
-- Dependencies: 229
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3227 (class 2604 OID 115730)
-- Name: card_usages id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.card_usages ALTER COLUMN id SET DEFAULT nextval('public.card_usages_id_seq'::regclass);


--
-- TOC entry 3228 (class 2604 OID 115731)
-- Name: cards_subscription id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_subscription ALTER COLUMN id SET DEFAULT nextval('public.cards_subscription_id_seq'::regclass);


--
-- TOC entry 3229 (class 2604 OID 115732)
-- Name: cities id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cities ALTER COLUMN id SET DEFAULT nextval('public.cities_id_seq'::regclass);


--
-- TOC entry 3230 (class 2604 OID 115733)
-- Name: faculties id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.faculties ALTER COLUMN id SET DEFAULT nextval('public.faculties_id_seq'::regclass);


--
-- TOC entry 3231 (class 2604 OID 115734)
-- Name: institutions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.institutions ALTER COLUMN id SET DEFAULT nextval('public.institutions_id_seq'::regclass);


--
-- TOC entry 3232 (class 2604 OID 115735)
-- Name: provinces id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.provinces ALTER COLUMN id SET DEFAULT nextval('public.provinces_id_seq'::regclass);


--
-- TOC entry 3233 (class 2604 OID 115736)
-- Name: subscription_pricing id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.subscription_pricing ALTER COLUMN id SET DEFAULT nextval('public.subscription_pricing_id_seq'::regclass);


--
-- TOC entry 3234 (class 2604 OID 115737)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3238 (class 2606 OID 115739)
-- Name: buses buses_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.buses
    ADD CONSTRAINT buses_pkey PRIMARY KEY (plate_number);


--
-- TOC entry 3236 (class 2606 OID 115741)
-- Name: agent_cards_distribution card_distribution_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agent_cards_distribution
    ADD CONSTRAINT card_distribution_pkey PRIMARY KEY (card);


--
-- TOC entry 3240 (class 2606 OID 115743)
-- Name: card_usages card_usages_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.card_usages
    ADD CONSTRAINT card_usages_pkey PRIMARY KEY (id);


--
-- TOC entry 3242 (class 2606 OID 115745)
-- Name: cards cards_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards
    ADD CONSTRAINT cards_pkey PRIMARY KEY (id);


--
-- TOC entry 3244 (class 2606 OID 115747)
-- Name: cards_selling_history cards_selling_history_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_selling_history
    ADD CONSTRAINT cards_selling_history_pkey PRIMARY KEY (card, seller);


--
-- TOC entry 3246 (class 2606 OID 115749)
-- Name: cards_subscription cards_subscription_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_subscription
    ADD CONSTRAINT cards_subscription_pkey PRIMARY KEY (id);


--
-- TOC entry 3248 (class 2606 OID 115751)
-- Name: cities cities_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY (id);


--
-- TOC entry 3250 (class 2606 OID 115753)
-- Name: faculties faculties_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.faculties
    ADD CONSTRAINT faculties_pkey PRIMARY KEY (id);


--
-- TOC entry 3252 (class 2606 OID 115755)
-- Name: institutions institutions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.institutions
    ADD CONSTRAINT institutions_pkey PRIMARY KEY (id);


--
-- TOC entry 3254 (class 2606 OID 115757)
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 3256 (class 2606 OID 115759)
-- Name: provinces provinces_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.provinces
    ADD CONSTRAINT provinces_pkey PRIMARY KEY (id);


--
-- TOC entry 3258 (class 2606 OID 115761)
-- Name: subscription_pricing subscription_pricing_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.subscription_pricing
    ADD CONSTRAINT subscription_pricing_pkey PRIMARY KEY (id);


--
-- TOC entry 3260 (class 2606 OID 115763)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3261 (class 2606 OID 115764)
-- Name: agent_cards_distribution fk_card_distribution_agent; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agent_cards_distribution
    ADD CONSTRAINT fk_card_distribution_agent FOREIGN KEY (agent) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3262 (class 2606 OID 115769)
-- Name: agent_cards_distribution fk_card_distribution_author; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agent_cards_distribution
    ADD CONSTRAINT fk_card_distribution_author FOREIGN KEY (created_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3263 (class 2606 OID 115774)
-- Name: agent_cards_distribution fk_card_distribution_card; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agent_cards_distribution
    ADD CONSTRAINT fk_card_distribution_card FOREIGN KEY (card) REFERENCES public.cards(id);


--
-- TOC entry 3264 (class 2606 OID 115779)
-- Name: agent_cards_distribution fk_card_distribution_editor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agent_cards_distribution
    ADD CONSTRAINT fk_card_distribution_editor FOREIGN KEY (updated_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3265 (class 2606 OID 115784)
-- Name: card_usages fk_card_usages_bus; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.card_usages
    ADD CONSTRAINT fk_card_usages_bus FOREIGN KEY (bus) REFERENCES public.buses(plate_number);


--
-- TOC entry 3266 (class 2606 OID 115789)
-- Name: card_usages fk_card_usages_card; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.card_usages
    ADD CONSTRAINT fk_card_usages_card FOREIGN KEY (card) REFERENCES public.cards(id);


--
-- TOC entry 3267 (class 2606 OID 115794)
-- Name: cards fk_cards_assigner; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards
    ADD CONSTRAINT fk_cards_assigner FOREIGN KEY (assigned_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3268 (class 2606 OID 115799)
-- Name: cards fk_cards_author; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards
    ADD CONSTRAINT fk_cards_author FOREIGN KEY (created_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3269 (class 2606 OID 115804)
-- Name: cards fk_cards_distribution_agent; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards
    ADD CONSTRAINT fk_cards_distribution_agent FOREIGN KEY (agent) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3270 (class 2606 OID 115809)
-- Name: cards fk_cards_owner; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards
    ADD CONSTRAINT fk_cards_owner FOREIGN KEY (card_owner) REFERENCES public.users(id);


--
-- TOC entry 3271 (class 2606 OID 115814)
-- Name: cards_selling_history fk_cards_selling_history_card; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_selling_history
    ADD CONSTRAINT fk_cards_selling_history_card FOREIGN KEY (card) REFERENCES public.cards(id);


--
-- TOC entry 3272 (class 2606 OID 115819)
-- Name: cards_selling_history fk_cards_selling_history_owner; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_selling_history
    ADD CONSTRAINT fk_cards_selling_history_owner FOREIGN KEY (owner) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3273 (class 2606 OID 115824)
-- Name: cards_selling_history fk_cards_selling_history_seller; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_selling_history
    ADD CONSTRAINT fk_cards_selling_history_seller FOREIGN KEY (seller) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3274 (class 2606 OID 115829)
-- Name: cards_subscription fk_cards_subscription_card; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cards_subscription
    ADD CONSTRAINT fk_cards_subscription_card FOREIGN KEY (card) REFERENCES public.cards(id);


--
-- TOC entry 3275 (class 2606 OID 115834)
-- Name: cities fk_cities_province; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT fk_cities_province FOREIGN KEY (province) REFERENCES public.provinces(id);


--
-- TOC entry 3276 (class 2606 OID 115839)
-- Name: subscription_pricing fk_subscription_pricing_author; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.subscription_pricing
    ADD CONSTRAINT fk_subscription_pricing_author FOREIGN KEY (created_by) REFERENCES public.users(id);


--
-- TOC entry 3277 (class 2606 OID 115844)
-- Name: subscription_pricing fk_subscription_pricing_editor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.subscription_pricing
    ADD CONSTRAINT fk_subscription_pricing_editor FOREIGN KEY (updated_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3278 (class 2606 OID 115849)
-- Name: users fk_users_author; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_author FOREIGN KEY (created_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3279 (class 2606 OID 115854)
-- Name: users fk_users_cards; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_cards FOREIGN KEY (card) REFERENCES public.cards(id) NOT VALID;


--
-- TOC entry 3280 (class 2606 OID 115859)
-- Name: users fk_users_city; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_city FOREIGN KEY (city) REFERENCES public.cities(id) NOT VALID;


--
-- TOC entry 3281 (class 2606 OID 115864)
-- Name: users fk_users_editor; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_editor FOREIGN KEY (updated_by) REFERENCES public.users(id) NOT VALID;


--
-- TOC entry 3282 (class 2606 OID 115869)
-- Name: users fk_users_faculty; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_faculty FOREIGN KEY (faculty) REFERENCES public.faculties(id) NOT VALID;


--
-- TOC entry 3283 (class 2606 OID 115874)
-- Name: users fk_users_institution; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT fk_users_institution FOREIGN KEY (institution) REFERENCES public.institutions(id) NOT VALID;


-- Completed on 2021-12-27 14:33:00 EAT

--
-- PostgreSQL database dump complete
--

