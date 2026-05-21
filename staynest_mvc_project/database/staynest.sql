DROP DATABASE IF EXISTS staynest;
CREATE DATABASE staynest;
USE staynest;

-- =========================
-- 1. USER ACCOUNT MANAGEMENT
-- =========================
CREATE TABLE users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100) NOT NULL,
    Email VARCHAR(120) NOT NULL UNIQUE,
    PasswordHash VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(30),
    UserRole ENUM('Customer','Host','Staff','Admin') NOT NULL DEFAULT 'Customer',
    IsActive BOOLEAN NOT NULL DEFAULT TRUE,
    DateJoined DATE NOT NULL DEFAULT (CURRENT_DATE)
);

-- =========================
-- 2. LOCATION MANAGEMENT
-- =========================
CREATE TABLE locations (
    LocationID INT AUTO_INCREMENT PRIMARY KEY,
    District VARCHAR(80) NOT NULL,
    City VARCHAR(80) NOT NULL DEFAULT 'Copenhagen',
    Postcode VARCHAR(20) NOT NULL,
    TransportZone VARCHAR(30),
    IsPopular BOOLEAN NOT NULL DEFAULT FALSE
);

-- =========================
-- 3. HOSTING MANAGEMENT
-- =========================
CREATE TABLE hosts (
    HostID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    CompanyName VARCHAR(120) NOT NULL,
    ContactPerson VARCHAR(100) NOT NULL,
    LicenseNumber VARCHAR(80),
    IsVerified BOOLEAN NOT NULL DEFAULT FALSE,
    DateRegistered DATE NOT NULL DEFAULT (CURRENT_DATE),
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE
);

-- =========================
-- 4. PROPERTY MANAGEMENT
-- =========================
CREATE TABLE properties (
    PropertyID INT AUTO_INCREMENT PRIMARY KEY,
    HostID INT NOT NULL,
    LocationID INT NOT NULL,
    PropertyTitle VARCHAR(120) NOT NULL,
    PropertyType VARCHAR(60) NOT NULL,
    Address VARCHAR(180) NOT NULL,
    Bedrooms INT NOT NULL,
    Bathrooms INT NOT NULL,
    PricePerMonth DECIMAL(10,2) NOT NULL,
    AvailabilityStatus ENUM('Available','Unavailable','Under Review') NOT NULL DEFAULT 'Available',
    ImagePath VARCHAR(255) DEFAULT 'assets/images/property1.svg',
    Description TEXT,
    DateListed DATE NOT NULL DEFAULT (CURRENT_DATE),
    FOREIGN KEY (HostID) REFERENCES hosts(HostID) ON DELETE CASCADE,
    FOREIGN KEY (LocationID) REFERENCES locations(LocationID) ON DELETE CASCADE
);

-- Extra property images
CREATE TABLE property_images (
    ImageID INT AUTO_INCREMENT PRIMARY KEY,
    PropertyID INT NOT NULL,
    ImagePath VARCHAR(255) NOT NULL,
    IsMain BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (PropertyID) REFERENCES properties(PropertyID) ON DELETE CASCADE
);

-- =========================
-- 5. BOOKING MANAGEMENT
-- =========================
CREATE TABLE bookings (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    PropertyID INT NOT NULL,
    BookingDate DATE NOT NULL DEFAULT (CURRENT_DATE),
    CheckInDate DATE NOT NULL,
    CheckOutDate DATE NOT NULL,
    IsConfirmed BOOLEAN NOT NULL DEFAULT FALSE,
    BookingStatus ENUM('Pending','Confirmed','Cancelled') NOT NULL DEFAULT 'Pending',
    Notes VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE,
    FOREIGN KEY (PropertyID) REFERENCES properties(PropertyID) ON DELETE CASCADE
);

-- =========================
-- ADDITIONAL PROFESSIONAL TABLES
-- =========================
CREATE TABLE payments (
    PaymentID INT AUTO_INCREMENT PRIMARY KEY,
    BookingID INT NOT NULL,
    Amount DECIMAL(10,2) NOT NULL,
    PaymentDate DATE NOT NULL DEFAULT (CURRENT_DATE),
    PaymentStatus ENUM('Pending','Paid','Failed','Refunded') NOT NULL DEFAULT 'Pending',
    PaymentMethod VARCHAR(50),
    FOREIGN KEY (BookingID) REFERENCES bookings(BookingID) ON DELETE CASCADE
);

CREATE TABLE maintenance_requests (
    RequestID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    PropertyID INT NOT NULL,
    RequestTitle VARCHAR(120) NOT NULL,
    Description TEXT NOT NULL,
    RequestDate DATE NOT NULL DEFAULT (CURRENT_DATE),
    RequestStatus ENUM('Open','In Progress','Resolved') NOT NULL DEFAULT 'Open',
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE,
    FOREIGN KEY (PropertyID) REFERENCES properties(PropertyID) ON DELETE CASCADE
);

CREATE TABLE reviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    PropertyID INT NOT NULL,
    Rating INT NOT NULL CHECK (Rating BETWEEN 1 AND 5),
    Comment TEXT,
    ReviewDate DATE NOT NULL DEFAULT (CURRENT_DATE),
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE,
    FOREIGN KEY (PropertyID) REFERENCES properties(PropertyID) ON DELETE CASCADE
);

CREATE TABLE notifications (
    NotificationID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    Message VARCHAR(255) NOT NULL,
    IsRead BOOLEAN NOT NULL DEFAULT FALSE,
    CreatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE
);

CREATE TABLE admin_logs (
    LogID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    ActionDescription VARCHAR(255) NOT NULL,
    LogDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE
);

-- =========================
-- SAMPLE DATA
-- =========================

INSERT INTO users (FullName, Email, PasswordHash, PhoneNumber, UserRole, IsActive)
VALUES
('Admin User', 'admin@staynest.com', 'admin123', '11111111', 'Admin', 1),
('Staff User', 'staff@staynest.com', 'staff123', '22222222', 'Staff', 1),
('Copenhagen Living Host', 'host@staynest.com', 'host123', '33333333', 'Host', 1),
('Customer User', 'user@staynest.com', 'user123', '44444444', 'Customer', 1),
('Al Alif Sarker', 'alalif@example.com', 'user123', '55555555', 'Admin', 1);

INSERT INTO locations (District, City, Postcode, TransportZone, IsPopular)
VALUES
('Nørrebro', 'Copenhagen', '2200', 'Zone 2', 1),
('Østerbro', 'Copenhagen', '2100', 'Zone 2', 1),
('Vesterbro', 'Copenhagen', '1620', 'Zone 1', 1),
('Amager', 'Copenhagen', '2300', 'Zone 3', 0),
('Frederiksberg', 'Copenhagen', '2000', 'Zone 2', 1);

INSERT INTO hosts (UserID, CompanyName, ContactPerson, LicenseNumber, IsVerified)
VALUES
(3, 'Copenhagen Living Partners', 'Mikkel Hansen', 'CLP-2026-01', 1);

INSERT INTO properties 
(HostID, LocationID, PropertyTitle, PropertyType, Address, Bedrooms, Bathrooms, PricePerMonth, AvailabilityStatus, ImagePath, Description)
VALUES
(1, 1, 'Modern Studio near Nørrebro Station', 'Studio Apartment', 'Nørrebrogade 45', 1, 1, 7800.00, 'Available', 'assets/images/property1.svg', 'Compact modern studio close to transport and cafes.'),
(1, 2, 'Bright Family Apartment in Østerbro', 'Apartment', 'Østerbrogade 102', 3, 1, 14500.00, 'Available', 'assets/images/property2.svg', 'Spacious apartment suitable for a small family.'),
(1, 3, 'Premium City Room in Vesterbro', 'Room', 'Istedgade 22', 1, 1, 6200.00, 'Available', 'assets/images/property3.svg', 'Private room with shared facilities in central Copenhagen.'),
(1, 4, 'Affordable Apartment in Amager', 'Apartment', 'Amagerbrogade 88', 2, 1, 10500.00, 'Available', 'assets/images/property1.svg', 'Comfortable apartment with easy metro access.'),
(1, 5, 'Luxury Flat in Frederiksberg', 'Luxury Apartment', 'Gammel Kongevej 70', 2, 2, 18000.00, 'Under Review', 'assets/images/property2.svg', 'Premium flat in a quiet and attractive area.');

INSERT INTO property_images (PropertyID, ImagePath, IsMain)
VALUES
(1, 'assets/images/property1.svg', 1),
(2, 'assets/images/property2.svg', 1),
(3, 'assets/images/property3.svg', 1),
(4, 'assets/images/property1.svg', 1),
(5, 'assets/images/property2.svg', 1);

INSERT INTO bookings 
(UserID, PropertyID, BookingDate, CheckInDate, CheckOutDate, IsConfirmed, BookingStatus, Notes)
VALUES
(4, 1, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), DATE_ADD(CURDATE(), INTERVAL 37 DAY), 0, 'Pending', 'Interested in viewing first.'),
(4, 2, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 14 DAY), DATE_ADD(CURDATE(), INTERVAL 44 DAY), 1, 'Confirmed', 'Confirmed booking for family apartment.');

INSERT INTO payments (BookingID, Amount, PaymentStatus, PaymentMethod)
VALUES
(1, 7800.00, 'Pending', 'Card'),
(2, 14500.00, 'Paid', 'Bank Transfer');

INSERT INTO maintenance_requests (UserID, PropertyID, RequestTitle, Description, RequestStatus)
VALUES
(4, 1, 'Heating issue', 'The heating is not working properly.', 'Open');

INSERT INTO reviews (UserID, PropertyID, Rating, Comment)
VALUES
(4, 2, 5, 'Very clean and comfortable apartment.');

INSERT INTO notifications (UserID, Message, IsRead)
VALUES
(4, 'Your booking request has been submitted.', 0),
(1, 'A new booking request requires review.', 0);

INSERT INTO admin_logs (UserID, ActionDescription)
VALUES
(1, 'Initial StayNest database created.');
